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
use Carbon\Carbon;

class UsersController extends Controller{

	public function __construct(Request $request)
	{
		$this->request = $request;
	}

	// Update Profile Process
	public function updateProfile(Request $request)
	{
		DB::beginTransaction();

		try {


			if ($request->input('password')) {
				$update = Users::find($request->input('id_users'));
				$update->username = $request->input('username');
				$update->nama = $request->input('nama');
				$update->email = $request->input('email');
				$update->website = $request->input('website');
				$update->update();
				DB::commit();
				return redirect('users/profile');	
			}else{
				$update = Users::find($request->input('id_users'));
				$update->username = $request->input('username');
				$update->nama = $request->input('nama');
				$update->email = $request->input('email');
				$update->website = $request->input('website');
				$update->password = $request->input('password');
				$update->update();
				DB::commit();
				return redirect('users/profile');	
			}

		} catch (Exception $e) {
			 DB::rollback();
			// print_r($e);
		}
	}

	// Users Notif
	public function pengumumanUsers()
	{
		$notif = notif::all();
		return view('src.users.profile.v_pengumuman', ['notif' => $notif]);
	}
}

?>