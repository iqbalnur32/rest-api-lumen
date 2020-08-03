<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ResponseHandler;
use \Firebase\JWT\JWT;
use App\Models\PetaniLevel as level;
use App\Models\UsersPetani as users;
use App\Models\PetaniProfile as profile;
use App\Models\Artikel as artikel;
use App\Http\Controllers\Auth\AuthController;

class ProfileController extends Controller
{
	
	public function __construct(Request $request)
	{
		$this->request = $request;
		$this->respHandler = new ResponseHandler;
		$this->getToken = new AuthController;
		// session_start();
	}

	/*
		Profile Get By Id
	*/
	public function GetPorfileById(Request $request)
	{
		try {
			
			$id_users = $this->getToken->getID($request);
			$getUsers = users::join('petani_profile', 'users_petani.id_users', '=', 'petani_profile.id_profile')
							->where('users_petani.id_users', $id_users)
							->first();

			return $this->respHandler->resSuccess(200, 'Success', 
				[
					'user' => $getUsers
				]
			);	

		} catch (Exception $e) {
			return $this->respHandler->resError(401, 'Error', 'Users Not Found');
			// print_r($e);
		}
	}

	/*
		Update Profile
	*/
	public function profileEdit(Request $request, $id_users)
	{
		try {

			// Validasi
			$this->validate($request, [
				'email' => 'required|string|email',
				// 'password' => 'required|string|confirmed',
				'password' => 'required|string',
				'username' => 'required|string',
			]);
		
			$users = users::find($id_users);
			$users->username = $request->input('username');
			$users->email = $request->input('email');
			$users->password = $request->input('password');
			$users->status = 'Tidak Aktif';
			$users->token = null;
			$users->level_id = 2;
			$save = $users->update();

			if ($save) {

				$id_user = users::select('id_users')->where('email', $request->input('email'))->first();

				$profile = profile::find($id_users);
				$profile->id_profile = $id_user->id_users;
				$profile->nama = $request->input('nama');
				$profile->alamat = $request->input('alamat');
				$profile->no_telp = $request->input('no_telp');
				$profile->foto_profile = $request->input('foto_profile');
				$save2 = $profile->update();

				if ($save2) {
					return $this->respHandler->resSuccess(200, 'Success', [
						'data' => $profile
					]);	
				}else{
					users::where('email', $request->input('email'))->delete();
					return $this->respHandler->resError(401, 'Error', 'Update Register Null');
				}

			}else{
				users::where('email', $request->input('email'))->delete();
				return $this->respHandler->resError(401, 'Error', 'Update Register Failed');
			}
			
		} catch (Exception $e) {
			// print_r($e);
			return $this->respHandler->internalError();
		}
	}

	// Update Password Profile
	public function UpdatePassword(Request $request)
	{
		try {
			
			$this->validate($request, [
				'password_current' => 'required|string',
				'password_new' => 'required|string|',
				'password_confirmation' => 'required|same:password_new',
			]);

			$id_users = $this->getToken->getID($request); // jwt token header getId
			$password = $request->input('password_current');

			$where = [
				'password' => $password,
				'id_users' => $id_users
			];

			$data = users::where($where)->first();

			if ($data) {

				$users_pass = users::find($id_users);
				$users_pass->password = $request->input('password_new');
				$users_pass->update();

				return $this->respHandler->resSuccess(200, 'Success', ['data' => $users_pass]);

			} else {
				return $this->respHandler->resError(401, 'Error', 'Password Lama Tidak Cocok');
			}

		} catch (Exception $e) {

			return $this->respHandler->internalError();	
		}
	}

	/*
		Delete Users
	*/
	public function deleteUsers(Request $request, $id_users)
	{
		try {
			
			// $users = users::findOrFail($id_users)->delete();
			$users = users::where('id_users', $id_users)->first();
			
			if ($users === null) {

				return $this->respHandler->resError(401, 'Error', 'Users Not Found');
			}

			$users->delete();
			return $this->respHandler->resSuccess(200, 'Success', ['message' => 'Success Delete']);	

		} catch (Exception $e) {

			return $this->respHandler->internalError();
		}
	}

	/*
		Logout Users
	*/
	public function Logout(Request $request)
	{
		$id_users = $this->getToken->getID($request);
		$logout = users::where('id_users', $id_users)->update(['status' => 'Tidak Aktif']);

		if ($logout === null) {
			return $this->respHandler->resError(401, 'Error', 'Users Not Found');
		}

		return $this->respHandler->resSuccess(200, 'Success', ['user' => 'success']);	
	}

}
?>