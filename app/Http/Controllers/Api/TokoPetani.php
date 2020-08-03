<?php 

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ResponseHandler;
use \Firebase\JWT\JWT;
use App\Models\TokoPetani as Toko;
use App\Models\ProdukPetani as Produk;
use App\Http\Controllers\Auth\AuthController;
use App\CustomID;
use \Helper;


class TokoPetani extends Controller
{
	
	public function __construct(Request $request)
	{
		$this->request = $request;
		$this->respHandler = new ResponseHandler;
		$this->getToken = new AuthController;
		$this->UUID = new CustomID;
	}

	private function rules() 
	{
		return [
			'email' => 'required|string|email|unique:toko_petani,email',
			'nama_toko' => 'required|string|unique:toko_petani,nama_toko',
			'alamat_toko' => 'required|string',
			'no_telp' => 'required|string'
		];
	}

	// UUID TEST
	public function test()
	{
		$data = $this->UUID->UUID();

		print_r($data);
	}

	private function month($string)
	{
		$bulan = array("Januari" => "01", "Februari" => "02", "Maret" => "03", "April" => "04", "Mei" => "05", "Juni" => "06", "Juli" => "07", "Agustus" => "08", "September" => "09", "Oktober" => "10", "November" => "11", "Desember" => "12");

		return $bulan[$string];

		//Tanggal n Hari Kebelakang dari Tanggal Tertentu
		// $tanggal = "2015-05-19";
		// $hari = 3;
		// $minggu_lalu = date('Y-m-d', strtotime('-$hari day', strtotime($tanggal)));
	}

	// Date Mengambil 1 minggu terahir 
	public function bulan($tanggal)
	{
		$start = date('Y F d', strtotime('-1 week', strtotime($tanggal)));
		$end = date('Y F d', strtotime($tanggal));

		return response()->json(['start' => $start, 'end' => $end]);
	}

	// Petani ADD
	public function TokoPetaniAdd(Request $request)
	{
		try {
			$this->validate($request, $this->rules());

			$id_users = $this->getToken->getID($request); // id users by token jwt

			$toko_add = array( 
				'id_toko' => $id_users,
				'id_users' => $id_users, 
				'email' => $request->input('email'), 
				'nama_toko' => $request->input('nama_toko'), 
				'alamat_toko' => $request->input('alamat_toko'), 
				'no_telp' => $request->input('no_telp'), 
				'status' => 'waiting'
			);

			Toko::insert($toko_add);

			return $this->respHandler->resSuccess(200, 'Sucess', ['data_toko' => $toko_add]);

		} catch (Exception $e) {

			return $this->internalError();
		}
	}

	// Update Toko Petani
	public function UpdateToko(Request $request)
	{
		try {

			$this->validate($request, [
				'email' => 'required|string|email',
				'nama_toko' => 'required|string',
				'alamat_toko' => 'required|string',
				'no_telp' => 'required|string'
			]);

			$id_users = $this->getToken->getID($request); // id users by token jwt

			$toko_update = array( 
				'id_toko' => $id_users,
				'id_users' => $id_users, 
				'email' => $request->input('email'), 
				'nama_toko' => $request->input('nama_toko'), 
				'alamat_toko' => $request->input('alamat_toko'), 
				'no_telp' => $request->input('no_telp'), 
				'status' => 'waiting'
			);

			Toko::find($id_users)->update($toko_update);

			return $this->respHandler->resSuccess(200, 'Sucess', ['data_toko' => $toko_update]);

		} catch (Exception $e) {
			
			return $this->internalError();
		}
	}

	// Delete
	public function DeleteToko(Request $request, $id_toko)
	{
		try {

			$id_users = $this->getToken->getID($request); // id users by token jwt

			$delete_toko = Toko::where('id_toko', $id_toko)->first();
			$delete_toko->delete();

			return $this->respHandler->resSuccess(200, 'Sucess', ['data_toko' => 'Delete Toko Sucess']);

		} catch (Exception $e) {

			return $this->internalError();
		}	
	}

	/*
		Produk Toko 
	*/
	public function ProdukTokoAdd(Request $request)
	{
		try {
			
			$id_users = $this->getToken->getID($request);

			$produk = array(
				'id_grade_sayuran' => $request->id_grade_sayuran,
				'id_toko' => $id_users,
				'product_name' => $request->product_name,
				'stock' => $request->stock,
				'price' => $request->price
			);

			Produk::insert($produk);
			
			return $this->respHandler->resSuccess(200, 'Sucess', ['data_toko' => $produk]);			

		} catch (Exception $e) {

			return $this->internalError();
		}
	}

	// Update Produk Toko
	public function UpdateTokoProduk(Request $request)
	{
		try {
			
			$id_users = $this->getToken->getID($request);

			$produk = array(
				'id_grade_sayuran' => $request->id_grade_sayuran,
				'id_toko' => $id_users,
				'product_name' => $request->product_name,
				'stock' => $request->stock,
				'price' => $request->price
			);

			Produk::find($id_users)->update($produk);
			
			return $this->respHandler->resSuccess(200, 'Sucess Update', ['data_toko' => $produk]);			

		} catch (Exception $e) {

			return $this->internalError();
			// print_r($e);
		}
	}
}


?>