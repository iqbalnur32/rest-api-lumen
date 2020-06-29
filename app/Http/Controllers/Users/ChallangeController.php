<?php 

namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task_CTF as task;
use App\Models\Solved_CTF as solved;
use App\Models\Score_CTF as score;
use App\Models\Users as users;
use App\Models\Category_CTF as kategori;
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

	private function searchCategory($status = false)
	{
		$select = [

		];

		$data = kategori::select(['*'])
		->join('task_ctf', 'category_ctf.id_category', '=', 'task_ctf.id_category');

		if ($status) {
			$category = $_GET['kategori'];

			$data->where('id_category', 'like', '&'.$category.'&');
		}

		$datas = $data->get();

		$output = [];

		foreach ($output as $key => $value) {
			$output[] = [
				'id_category' => $value->id_category
			];
		}

		return $output;
	}

	// Index Challange
	public function index(Request $request)
	{
		// $task = task::orderBy('id_category', 'asc')->get();
		
		// if (isset($_GET['kategori'])) {
		// 	$data = $this->searchCategory(true);
		// }else{
		// 	$data = $this->searchCategory(true);
		// }

		// Query Task And Solved Challange 
		$solved = solved::where('id_users', $_SESSION['id_users'])->pluck('id_task');
		$task = task::whereNotIn('id_task', $solved)->orderBy('id_category', 'desc')->get();
		$kategori = kategori::all();

		// echo json_encode($task); die();

		

		// var_dump($solved); die();

		return view('src.users.challange.v_challange', ['task' => $task, 'kategori' =>  $kategori]);
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
                'score' => 5
            ]);
		}

		// Jika Flag Benar Maka Score Akan DI Update Dari Point Task
		Score::where('id_users', $_SESSION['id_users'])->increment('score', $score, ['updated_at' => Carbon::now()]);
	}
}
?>