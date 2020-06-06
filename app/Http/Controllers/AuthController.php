<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Score_CTF as Score;
use Session;
use Validator;
use DB;

class AuthController extends Controller
{
	
	public function __construct(Request $request)
	{
		session_start();
		$this->request = $request;
	}

	private $table_users = 'users_ctf';

	public function login()
	{
		// echo '<pre>',print_r($data),'</pre>'; die();
		
		return view('src/auth/v_login');
	}

	public function loginProcess(Request $request)
	{
		try {
			
			$this->validate($request, [
				'email' => 'required|string',
				'password' => 'required|string',
			]);

			$email = $request->input('email');
			$password = $request->input('password');

			$where = [
				'email' => $email,
				'password' => $password
			];

			$data = Users::where($where)->first();

			if ($data) {
				
				$dataSession = [
					'id_users' => $data->id_users,
    				'username' => $data->username,
    				'id_level' => $data->level_id
    			];

    			$_SESSION = $dataSession;

    			if ($data->level_id == 1) {
    				// print_r($dataSession); die();
    				return redirect(url('admin'));

    			}else if ($data->level_id == 2) {

    				DB::table($this->table_users)->where('email', $request->input('email'))->update(array('last_login' => date("Y-m-d"), 'login' => 'true'));
    				return redirect(url('users'));
    			}else{
    				Session::flash('gagal', 'Login Gagal Pastikan Akun Anda Benar');
    				return redirect('login');
    			}

			}else{
				// Session::flash('gagal', 'Login Gagal Pastikan Akun Anda Benar');
				return redirect('login');
			}	

		} catch (Exception $e) {
			print_r($e);
		}
	}

	public function register()
	{
		return view('src.auth.v_register');
	}

	public function registerProcess(Request $request)
	{
		try {
			$rules = [
				'email' => 'required|string|email|unique:users_ctf,email',
				'password' => 'required|string|confirmed',
				'username' => 'required|string',
			];

			$validator = Validator::make($request->all(), $rules);

			if ($validator->fails()) {
				// return redirect('/register')->withInput()->withErrors($validator);
				echo "Pastikan Email Anda Benar Dan Inputan Harus Benar";
			}

			$insert = new Users;
			$insert->username = $request->input('username');
			$insert->nama = $request->input('nama');
			$insert->email = $request->input('email');
			$insert->password = $request->input('password');
			$insert->website = 'https://a.com/';
			$insert->level_id = 2;
			$insert->login = 'false';
			$insert->last_login = date('Y-m-d');
			$save = $insert->save();
			
			if ($save) {
				
				$id_user = Users::select('id_users')->where('email', $request->input('email'))->first();

				// echo json_encode($id_user); die();

				$insert2 = new Score;
				$insert2->id_users = $id_user->id_users;
				$insert2->score = 0;
				$save2 = $insert2->save();

				if ($save2) {
					return redirect('/login');
				}else{
					Users::where('email',$request->input('email'))->delete();
					return redirect('/register');
				}

			}else{
				Users::where('email',$request->input('email'))->delete();
				return redirect('/register');
			}

		} catch (Exception $e) {
			print_r($e);
		}
	}

	public function Logout()
	{
		if (session_destroy()) {
			// DB::table($this->table_users)->where('id_users', $_SESSION['id_users'])->update(array('login' => 'false'));
			return redirect('/');
		}
	}
}
?>