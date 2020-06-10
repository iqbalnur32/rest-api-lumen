<?php 

namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task_CTF as task;
use App\Models\Solved_CTF as solved;
use App\Models\Score_CTF as score;
use App\Models\Users;
use DB;
use Carbon\Carbon;

class ScoreboardController extends Controller{

	public function __construct(Request $request)
	{
		$this->request = $request;
	}

	public function getScorePerPlayer()
	{
		$score = 0;

		$solutions = solved::where('id_users', $_SESSION['id_users'])->get();

		foreach ($solutions as $solution) {
			$point = task::where('id_task', $solution['id_task'])->get();
			foreach ($point as $key) {
				$score += $key->task_point;
			}
		}

		return $score;
	}

	public function getScores()
	{
		$users = DB::table('users_ctf')->get([
			'id_users', 'username'
		]);

		$score_array = [];

		foreach ($users as $key) {
			$score = $this->getScorePerPlayer($key->id_users);
			$id_users = $key->id_users;
			$username = $key->username;
			$temp_array = array(
				'id_users' => $id_users,
				'username' => $username,
				'score' => $score
			); 
			array_push($score_array, $temp_array);
		}

		$score_collection = collect($score_array);
		$score_sorted = $score_collection->sortByDesc('score');

		echo json_encode($score_sorted); die();
	}

	// Scoreboard Data 
	public function scoreboard()
	{
		$select = ['users_ctf.username', 'users_ctf.email', 'score_ctf.score'];
		$data_score = DB::table('users_ctf')->select($select)
					 ->join('score_ctf', 'users_ctf.id_users', '=', 'score_ctf.id_users')
					 ->orderBy('score', 'desc')
					 ->get();

		// echo json_encode($data_score); die();
		return view('src.users.scoreboard.v_scoreboard', ['score' => $data_score]);
	}

	// profile Users
	public function profile()
	{
		$select = ['users_ctf.username', 'score_ctf.score'];
		$data_users = DB::table('users_ctf')->select($select)
				->join('score_ctf', 'users_ctf.id_users', 'score_ctf.id_users')
				->where('users_ctf.id_users', $_SESSION['id_users'])
				->first();

		$solved = solved::select(['*'])
						 ->join('task_ctf', 'solved_ctf.id_task', '=', 'task_ctf.id_task')
						 ->where('solved_ctf.id_users', $_SESSION['id_users'])
						 ->get();

				
		$data = DB::table('users_ctf')->select(['*'])
				->join('score_ctf', 'users_ctf.id_users', 'score_ctf.id_users')
				->orderBy('score_ctf.score', 'desc')
				->pluck('score_ctf.username')
				->where('users_ctf.username', $_SESSION['username'])
				->toArray();
		$position = array_search('username', $data) + 1;
		
		// echo json_encode($solved); die();
		

		// Edit Profile
		$edit = DB::table('users_ctf')->select(['*'])->where('id_users', $_SESSION['id_users'])->first();

		return view('src.users.profile.v_profile',
			[
				'data' => $data_users, 
				'edit' => $edit, 
				'solved' => $solved
		]
		);
	}
}

?>