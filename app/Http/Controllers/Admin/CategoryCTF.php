<?php 
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category_CTF as kategori;
use DB;

class CategoryCTF extends Controller
{
	private $table_category = 'category_ctf';

	public function __construct(Request $request)
	{
		$this->request = $request;
	}

	// Views Index Category
	public function category()
	{
		$kategori = kategori::all();
		return view('src.admin.category.v_category_ctf', ['kategory' => $kategori]);
	}

	// Add Category Process
	public function Addcategory(Request $request)
	{
		try {

			$addCategory = array(
				'id_category' => $request->input('id_category'), 
				'category_name' => $request->input('category_name'), 
				'description' => $request->input('description'), 
			);

			DB::table($this->table_category)->insert($addCategory);
			return redirect('admin/ctf-category');

		} catch (Exception $e) {
			print_r($e);
		}
	}

	// Edit Category
	public function categoryEdit($id_category)
	{
		$edit_category = DB::table($this->table_category)->select(['*'])->where('id_category', $id_category)->first();

		return response()->json($edit_category);
	}

	public function categoryEditProcess(Request $request, $id_category)
	{
		try {
			$this->validate($request, [
				'category_name' => 'string|required',
				'description' => 'string|required'
			]);

			$editCategory = array(
				'id_category' => $request->input('id_category'),
				'category_name' => $request->input('category_name'),
				'description' => $request->input('description') 
			);

			DB::table($this->table_category)->where('id_category', $request->input('id_category'))->update($editCategory);

			return response()->json($editCategory);

		} catch (Exception $e) {
			return response()->json($e);
		}
	}

	public function categoryDelete($id_category)
	{
		$category_delete = kategori::destroy($id_category);
		return response()->json($category_delete);
	}
}
?>

