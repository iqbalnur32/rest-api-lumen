<?php 
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Validator;
use App\Models\Users;
use App\Models\Pengumuman;
use App\Models\Score_CTF as Score;
use App\Models\Users_Level as Level;
use App\Models\Task_CTF as Task;

class AdminController extends Controller
{
	
	public function __construct(Request $request)
	{
		$this->request = $request;
	}

	public function index()
	{
		return view('src.admin.v_home');
	}

	// Add Challange
	public function addChallange()
	{
		$categori_ctf = DB::table('category_ctf')->get();
		$task = Task::all();
		return view('src.admin.challange.v_addchallange', ['kategori' => $categori_ctf, 'task' => $task]);
	}

	// Edit Challange 
	public function addChallangeEdit($id_task)
	{
		$edit_task = task::where('id_task', $id_task)->first();

		return response()->json($edit_task);
	}

	// Edit Challange Process
	public function addChallangeEditProcess(Request $request, $id_task)
	{
		$task = array(
			'id_task' => $request->input('id_task'), 
			'name_task' => $request->input('name_task'), 
			'id_category' => $request->input('id_category'), 
			'author' => $request->input('author'), 
			'task_point' => $request->input('task_point'), 
			'flag' => $request->input('flag'), 
			'hint' => $request->input('hint'), 
		);

		DB::table('task_ctf')->where('id_task', $id_task)->update($task);
		return response()->json($task);
	}

	// Delete Challange 
	public function addChallangeDelete($id_task)
	{
		$delete = Task::find($id_task)->delete();

		return response()->json($delete);
	}

	// Add Challange Process
	public function addChallangeProcess(Request $request)
	{
		try {

			$addChallange = array(
				'id_category' => $request->input('id_category'), 
				'name_task' => $request->input('name_task'), 
				'hint' => $request->input('hint'), 
				'task_point' => $request->input('task_point'), 
				'flag' => $request->input('flag'), 
				'author' => $request->input('author'), 
			);

			DB::table('task_ctf')->insert($addChallange);
			return redirect(url('admin/add-challange'));

		} catch (Exception $e) {
			print_r($e);
		}
	}

	// Add Pengumuman
	public function addPengumuman()
	{
		$notif = DB::table('pengumuman_ctf')->get();
		return view('src.admin.v_pengumuman', ['notif' => $notif]);
	}

	// Edit Pengumuman
	public function editPengumuman($id_pengumuman)
	{
		$edit_pengumuman = DB::table('pengumuman_ctf')->select(['*'])->where('id_pengumuman', $id_pengumuman)->first();
		return response()->json($edit_pengumuman);
	}

	// Edit Pengumuman Process
	public function editPengumumanProcess(Request $request, $id_pengumuman)
	{
		try {
			$updatePengumuman = array(
				'id_pengumuman' => $request->input('id_pengumuman'),
				'title' => $request->input('title'), 
				'content' => $request->input('content'), 
			);

			DB::table('pengumuman_ctf')->where('id_pengumuman', $request->input('id_pengumuman'))->update($updatePengumuman);
			return response()->json($updatePengumuman);

		} catch (Exception $e) {
			print_r($r);
		}
	}

	// Add Pengumuman Process
	public function addPengumumanProcess(Request $request)
	{
		try {

			$addPengumuman = array(
				'title' => $request->input('title'), 
				'content' => $request->input('content'), 
			);

			DB::table('pengumuman_ctf')->insert($addPengumuman);
			return redirect(url('admin/add-pengumuman'));

		} catch (Exception $e) {
			print_r($e);
		}
	}

	// Delete Pengumuman
	public function pengumumanDelete($id_pengumuman)
	{
		$delete_pengumuman = Pengumuman::find($id_pengumuman)->delete();
		return response()->json($delete_pengumuman);
	}

	// Management User
	public function managementUser()
	{
		$select = ['users_ctf.username', 'users_ctf.email', 'score_ctf.score', 'users_ctf.level_id', 'users_level.name_level'];
		$level = Level::all();
		$management = Users::select(['*'])
					 ->join('users_level', 'users_ctf.level_id', '=', 'users_level.id_level')
					 ->join('score_ctf', 'users_ctf.id_users', '=', 'score_ctf.id_users')
					 ->get();

		return view('src.admin.management.v_management', ['level' => $level, 'management' => $management]);
	}

	// Add Management User Process
	public function manegemntUserAdd(Request $request)
	{
		try {
			$rules = [
				'email' => 'required|string|email|unique:users_ctf,email',
				'password' => 'required|string',
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
			$insert->website = $request->input('website');
			$insert->level_id = $request->input('level_id');
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
					return redirect('admin/management-user');
				}else{
					Users::where('email',$request->input('email'))->delete();
					return redirect('admin/management-user');
				}

			}else{
				Users::where('email',$request->input('email'))->delete();
				return redirect('admin/management-user');
			}

		} catch (Exception $e) {
			print_r($e);
		}
	}

	// Edit Management User 
	public function managementEdit($id_users)
	{
		$select = ['users_ctf.username', 'users_ctf.email', 'score_ctf.score', 'users_ctf.level_id', 'users_level.name_level'];
		$edit_management = Users::select(['*'])
						 ->join('users_level', 'users_ctf.level_id', '=', 'users_level.id_level')
						 ->join('score_ctf', 'users_ctf.id_users', '=', 'score_ctf.id_users')
						 ->where('users_ctf.id_users', $id_users)
						 ->first();

		return response()->json($edit_management);
	}

	// Edit Management User Process
	public function managementEditProcess(Request $request, $id_users)
	{
		try {
			$rules = [
				'email' => 'required|string',
				'password' => 'required|string',
				'username' => 'required|string',
			];

			$validator = Validator::make($request->all(), $rules);

			if ($validator->fails()) {
				// return redirect('/register')->withInput()->withErrors($validator);
				echo "Pastikan Email Anda Benar Dan Inputan Harus Benar";
			}

			$insert = Users::find($request->input('id_users'));
			$insert->username = $request->input('username');
			$insert->nama = $request->input('nama');
			$insert->email = $request->input('email');
			$insert->password = $request->input('password');
			$insert->website = $request->input('website');
			$insert->level_id = $request->input('level_id');
			$insert->login = 'true';
			$insert->last_login = date('Y-m-d');
			$save = $insert->update();
			
			if ($save) {
				
				$id_user = Users::select('id_users')->where('email', $request->input('email'))->first();

				$insert2 = Score::find($request->input('id_users'));
				$insert2->id_users = $id_user->id_users;
				$insert2->score = $request->input('score');
				$save2 = $insert2->update();

				return response()->json($save2);

			}else{
				Users::where('email',$request->input('email'))->delete();
				return response()->json([
					401,
					'Invalid Request'
				]);
			}

		} catch (Exception $e) {
			return response($e);
		}
	}

	// Delete Management
	public function managementDelete($id_users)
	{
		$users = Users::find($id_users)->delete();
		$score = Score::find($id_users)->delete();

		return response()->json([
			$users,
			$score
		]);
	}
}
?>

