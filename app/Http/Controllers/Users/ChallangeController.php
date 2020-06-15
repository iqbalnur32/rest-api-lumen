<?php 

namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task_CTF as task;
use App\Models\Solved_CTF as solved;
use App\Models\Score_CTF as score;
use App\Models\Users as users;
use DB;
use Carbon\Carbon;
use Validator;

class ChallangeController extends Controller
{
	
	public function __construct(Request $request)
	{
		$this->request = $request;
	}

	private $table = 'task_ctf';

	// 
	public function index(Request $request)
	{
		// $task = task::orderBy('id_category', 'asc')->get();
		
		// Query Task And Solved Challange 
		$solved = solved::where('id_users', $_SESSION['id_users'])->pluck('id_task');
		$task = task::whereNotIn('id_task', $solved)->orderBy('id_category', 'desc')->get();

		// var_dump($solved); die();

		return view('src.users.challange.v_challange', ['task' => $task]);
	}

	/*
		Fungsi Check Submit Flag 
	*/
	public function CheckSubmitFlag(Request $request)
	{
		DB::beginTransaction();
		try {

			$this->validate($request, [
				'id_task' => 'required|string',
				'flag' => 'required|string',
			]);

			$id_task = $request->input('id_task');
			$flag = $request->input('flag');
			
			$where = [
				'id_task' => $id_task,
				'flag' => $flag
			];
			$data = task::where($where)->first();

			if ($data) {

					// Jika data nya benar record tabke solved dan score
					$solved = new solved;
					$solved->id_users = $_SESSION['id_users'];
					$solved->id_task = $request->input('id_task');
					$solved->save();
					$this->scoreUpdate($request);

					DB::commit();
					return response()->json($data);

			}else{
				// return response()->json([401, 'Flag Ngak Ada']);
				echo 'flag ngak ada';
			}
		} catch (Exception $e) {
			DB::rollback();
			return response()->json($e);
		}
	}


	/*public function checkFlag()
	{
		$check = solved::select(['solved_ctf.id_task', 'task_ctf.flag'])
			->join('task_ctf', 'solved_ctf.id_task', '=', 'task_ctf.id_task')
			->where('id_users', $_SESSION['id_users'])
			->get();

		return $check;
	}*/

	/*
		Fungsi Penammbahan Score
	*/
	public function scoreUpdate(Request $request)
	{
		$task = task::find($request->input('id_task'));
		$score = $task->task_point;
		$user_score = score::where('id_users', $_SESSION['id_users'])->first();

		// Jika Users Score Data Tidak Ditemukan
		if(!$user_score || $user_score == null){
			$user_score = Score::create([
                'id_users' => $_SESSION['id_users'],
                'score' => 0
            ]);
		}

		// Jika Flag Benar Maka Score Akan DI Update Dari Point Task
		Score::where('id_users', $_SESSION['id_users'])->increment('score', $score, ['updated_at' => Carbon::now()]);
	}
}
?>