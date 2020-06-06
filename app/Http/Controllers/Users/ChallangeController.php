<?php 

namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task_CTF as task;
use App\Models\Solved_CTF as solved;
use App\Models\Score_CTF as score;
use DB;
use Carbon\Carbon;

class ChallangeController extends Controller
{
	
	public function __construct(Request $request)
	{
		$this->request = $request;
	}

	private $table = 'task_ctf';

	public function index()
	{
		$task = task::orderBy('id_category', 'asc')->get();
		$solved = solved::select(['*'])
				  ->join('task_ctf', 'solved_ctf.id_task', '=', 'task_ctf.id_task')
				  ->where('solved_ctf.id_users', $_SESSION['id_users'])
				  ->first();
		// echo json_encode($task); die();
		return view('src.users.challange.v_challange', ['task' => $task, 'solved' => $solved]);
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
				$solved = new solved;
				$solved->id_users = $_SESSION['id_users'];
				$solved->id_task = $request->input('id_task');
				$solved->save();
				$this->addScore($request);
				
				DB::commit();
				return redirect('/users/challange');
			}else{
				echo "flag ngak ada";
			}
		} catch (Exception $e) {
			DB::rollback();
			print_r($e);
		}
	}

	/*
		Fungsi Penammbahan Score
	*/
	public function addScore(Request $request)
	{
		$task = task::find($request->input('id_task'));
		$score = $task->task_point;
		$user_score = score::where('id_users', $_SESSION['id_users'])->first();

		// Jika Users Score Data Tidak Ada 
		if(!$user_score){
			$user_score = Score::create([
                'id_users' => $_SESSION['id_users'],
                'score' => 0
            ]);
		}

		// Jika Flag Benar Maka Score Akan DI Update Dari Point Task
		Score::where('id_users', $_SESSION['id_users'])
            ->increment('score', $score, ['updated_at' => Carbon::now()]);
	}
}
?>