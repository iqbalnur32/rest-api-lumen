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
						 
	}

	/*
		---------------------------------------------------------------
	*/

	// Index Home Users
	public function index()
	{				 
		return view('src.users.v_home');
	}

	// Landing Page
	public function landingPage()
	{
		return view('src.v_landing');
	}
}
?>

