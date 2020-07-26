<?php 
namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ResponseHandler;
use \Firebase\JWT\JWT;
use SmsTo;
use App\Models\PetaniLevel as level;
use App\Models\UsersPetani as users;
use App\Models\PetaniProfile as profile;

class AuthController extends Controller
{
	
	public function __construct()
	{
		// $this->request = $request;
		$this->respHandler = new ResponseHandler;
		session_start();
	}
	// Jwt
	public function jwt($user){
		$payload = [
			'iss' => 'lumen-jwt',
			'sub' => $user
		];

		return JWT::encode($payload, env('JWT_SECRET'));
	}

	// getID by Token JWT
	public function getID($request){
		$header = $request->header('Authorization');
		$ex = explode(" ", $header);
		$ex2 = explode(".", $ex[1]);
		$base64 = base64_decode($ex2[1]);
		$json = json_decode($base64);

		return $json->sub->id_users;
	}

	// Login Controller
	public function loginProcess(Request $request)
	{
		try {

			// Validasi
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

			$data = users::where($where)->first();

			if ($data) {

				// Session

				if ($data->level_id === 1) {
					$status = users::where('id_users', $data->id_users)->update(['status' => 'Aktif']);

					if ($status) {
						return $this->respHandler->resSuccess(200, 'success', [
							'users' => $data,
							'token' => $this->jwt($data)
						]);

						// return response()->json($this->jwt($data));

					}else{
						return $this->respHandler->resError(404, 'error', 'Tidak Aktif');	
					}
				}else{
					return $this->respHandler->resError(404, 'error', 'User Not Found');	
				}
			}else{
				return $this->respHandler->resError(404, 'error', 'Email & Password Wrong');	
			}

		} catch (Exception $e) {
			return $this->respHandler->internalError();
			// print_r($e);
		}
	}

	// Register Controller
	public function registerProcess(Request $request)
	{
		try {

			// Validasi
			$this->validate($request, [
				'email' => 'required|string|email|unique:users_petani,email',
				// 'password' => 'required|string|confirmed',
				'password' => 'required|string',
				'username' => 'required|string',
			]);

			$users = new users;
			$users->username = $request->input('username');
			$users->email = $request->input('email');
			$users->password = $request->input('password');
			$users->status = 'Tidak Aktif';
			$users->token = null;
			$users->level_id = 2;
			$save = $users->save();

			if ($save) {

				$id_user = users::select('id_users')->where('email', $request->input('email'))->first();

				$profile = new profile;
				$profile->id_profile = $id_user->id_users;
				$profile->nama = $request->input('nama');
				$profile->alamat = $request->input('alamat');
				$profile->no_telp = $request->input('no_telp');
				$profile->foto_profile = $request->input('foto_profile');
				$save2 = $profile->save();

				if ($save2) {
					return $this->respHandler->resSuccess(200, 'Success', [
						'data' => $save2
					]);	
				}else{
					users::where('email', $request->input('email'))->delete();
					return $this->respHandler->resError(401, 'Error', 'Register Null');
				}
			
			}else{
				users::where('email', $request->input('email'))->delete();
				return $this->respHandler->resError(401, 'Error', 'Register Failed');
			}
			
		} catch (Exception $e) {
			// print_r($e);
			return $this->respHandler->internalError();
		}
	}

	//OTP Rand
	private function otpRand(){
		$otp = rand(100000, 999999);

		return $otp;
	} 

	// Callback data
	public function callback(Request $request)
	{
		$request->trackingId;
		$request->messageId;
		$request->phone;
		$request->status;
		$request->parts;
		$request->price;
	}

	// OTP SEND SMS
	public function sendOTP(Request $request)
	{
		try {
			
			$this->validate($request, [
				'to' => 'required',
			]);

			$otp = $this->otpRand();

			$to = explode(',', $request->input('to'));
			$response = SmsTo::setMessage($otp)
						->setRecipients($to)
						->setSenderId('SMSTO')
						->setCallbackUrl('http://localhost:8080/api/callback')
						->sendMultiple();

			if ($response) {
				return $this->respHandler->resSuccess(200, 'Success', [
						'data' => $response
					]);	
			} else {
				return $this->respHandler->resError(401, 'Error', 'Failed');
			}

		} catch (Exception $e) {
			print_r($e);
		}
	}
}

?>
