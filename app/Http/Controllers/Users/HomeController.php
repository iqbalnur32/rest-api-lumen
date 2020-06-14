<?php 
namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task_CTF as task;
use App\Models\Solved_CTF as solved;
use App\Models\Score_CTF as score;
use App\Models\Users;
use App\Models\Pengumuman as notif;
use DB;

class HomeController extends Controller
{
	
	public function __construct(Request $request)
	{
		$this->request = $request;
	}

	// Static Data Solved
	public function solvedStatic()
	{
		$checkSolvedFlag = solved::select(['solved_ctf.created_at', DB::raw('count(*) as total')])
		->join('users_ctf', 'solved_ctf.id_users', '=', 'users_ctf.id_users')
		->groupBy('users_ctf.username')
		->where('users_ctf.id_users', $_SESSION['id_users'])
		->get();

		return response()->json($checkSolvedFlag);					 
	}

	// Index Home Users
	public function index()
	{	
		$solved = solved::select(['*'])
						 ->join('task_ctf', 'solved_ctf.id_task', '=', 'task_ctf.id_task')
						 ->where('solved_ctf.id_users', $_SESSION['id_users'])
						 ->get();

		return view('src.users.v_home', ['solved' => $solved]);
	}

	// Landing Page
	public function landingPage()
	{
		return view('src.v_landing');
	}
}
?>

