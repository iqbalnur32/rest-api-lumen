<?php 
namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
	
	public function __construct(Request $request)
	{
		$this->request = $request;
	}

	public function index()
	{
		return view('src.users.v_home');
	}

	public function landingPage()
	{
		return view('src.v_landing');
	}
}
?>

