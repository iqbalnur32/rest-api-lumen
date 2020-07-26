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
use App\Models\PetaniTopic as topic;

class PetaniController extends Controller
{
	
	public function __construct(Request $request)
	{
		$this->request = $request;
		$this->respHandler = new ResponseHandler;
	}

	/*
		Artikel getAll
	*/
	public function ArtikelGetAll()
	{
		try {
			
			$getAll = artikel::all();
			return $this->respHandler->resSuccess(200, 'Success', ['data' => $getAll]);

		} catch (Exception $e) {
			return $this->respHandler->resError(401, 'error', 'Failed Get All Data');		
		}
	}

	/*
		Artikel GetById
	*/
	public function ArtikelGetById($id)
	{
		try {

			$getId = artikel::select(['*'])->where('id', $id)->get();

			return $this->respHandler->resSuccess(200, 'Success', ['data' => $getId]);
		} catch (Exception $e) {

			return $this->respHandler->resError(401, 'error', 'Failed Get ById');
		}

	}

	/*
		Artikel Insert Data
	*/
	public function ArtikelPost(Request $request)
	{		
		try {
			
			$this->validate($request, [
				'title' => 'required|string|max:255',
				'description' => 'required|string',
				'id_users' => 'required|integer'
			]);	

			$artikel = new artikel;
			$artikel->title = $request->input('title');
			$artikel->description = $request->input('description');
			$artikel->id_users = $request->input('id_users');
			$artikel->save();

			return $this->respHandler->resSuccess(200, 'Success', ['data' => $artikel]);

		} catch (Exception $e) {

			return $this->respHandler->resError(401, 'error', 'Failed Insert Data');	
		}
	}


	/*
		Artikel Edit
	*/
	public function ArtikelEdit(Request $request, $id)
	{
		try {

			$artikel_edit = artikel::find($id);
			$artikel_edit->title = $request->input('title');
			$artikel_edit->description = $request->input('description');
			$artikel_edit->id_users = $request->input('id_users');
			$artikel_edit->update();	

			return $this->respHandler->resSuccess(200, 'Success', ['data' => $artikel_edit]);

		} catch (Exception $e) {
			print_r($e);
			return $this->respHandler->resError(401, 'error', 'Failed Insert Data');
		}
	}

	/*
		Forum Discuse Controller
	*/
	public function ForumPost(Request $request)
	{
		try {
			$this->validate($request, [
				'id_users' => 'required|integer',
				'title' => 'required|string|max:255',
				'content' => 'required|string',
			]);	

			$forum = [
				'id_users' => $request->input('id_users'),
				'title' => $request->input('title'),
				'content' => $request->input('content')
			];

			$data = topic::create($forum);

			if ($data === null) {
				return $this->respHandler->resError(401, 'error', 'Failed Insert Data');
			}

			return $this->respHandler->resSuccess(200, 'success', ['data' => $data]);


		} catch (Exception $e) {
			print_r($e);
			return $this->respHandler->internalError();
		}
	}

	public function ForumEdit(Request $request, $id_topic)
	{
		try {
			
			$forum_edit = topic::find($id_topic);
			$forum_edit->id_users = $request->input('id_users');
			$forum_edit->title = $request->input('title');
			$forum_edit->content = $request->input('content');
			$forum_edit->update();	

			return $this->respHandler->resSuccess(200, 'success', ['data' => $forum_edit]);

		} catch (Exception $e) {
			return $this->respHandler->internalError();
		}
	}

	/*
		Get All Nelayan Topic Join By Reply
	*/
	public function getAll()
	{
		try {

			$getAll = topic::with('replyPetani')->get();
			
			if ($getAll === null) {
				
				return $this->respHandler->resError(401, 'Error', 'Error Data Null');
			}

			$output = [];

			foreach ($getAll as $key => $value) {
				$output[] = [
					'id_topic' => $value->id_topic,
					'id_users' => $value->id_users,
					'title' => $value->title,
					'content' => $value->content,
					'created_at' => $value->created_at,
					'updated_at' => $value->updated_at,
					'replyPetani' => $value->replyPetani,
				];
			}

			return $this->respHandler->resSuccess(200, 'success', ['data' => $output]);

		} catch (Exception $e) {
			return $this->respHandler->internalError();	
		}
	}
}

?>