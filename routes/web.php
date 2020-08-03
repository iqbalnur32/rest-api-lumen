<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/key', function() {
    return \Illuminate\Support\Str::random(32);
});

// Auth Controllers
$router->post('api/auth/login', 'Auth\AuthController@loginProcess');
$router->post('api/auth/register', 'Auth\AuthController@registerProcess');
$router->post('api/otp', 'Auth\AuthController@sendOTP');
$router->post('api/callback', 'Auth\AuthController@callback');

// Api Petani
$router->group(['middleware' => ['jwt.auth'], 'prefix' => 'api/v1/', 'namespace' => 'Api'], function() use ($router) {
	
	// Artikel Petani
	$router->get('artikel/getAll', 'PetaniController@ArtikelGetAll');
	$router->get('artikel/get/{id}', 'PetaniController@ArtikelGetById');
	$router->post('artikel', 'PetaniController@ArtikelPost');
	$router->put('artikel/edit/{id}', 'PetaniController@ArtikelEdit');

	// Update & Delete Profile & Get Users By Id & Update Password
	$router->get('profile', 'ProfileController@GetPorfileById');
	$router->get('profile/delete/{id_users}', 'ProfileController@deleteUsers');
	$router->put('profile/edit/{id_users}', 'ProfileController@profileEdit');
	$router->put('profile/update-pw', 'ProfileController@UpdatePassword');
	
	// Forum Disccus Petani
	$router->get('forum/getAll/reply', 'PetaniController@getAll');
	$router->post('forum/add', 'PetaniController@ForumPost');
	$router->put('forum/edit/{id_topic}', 'PetaniController@ForumEdit');

	// Toko Petani 
	$router->post('toko/add', 'TokoPetani@TokoPetaniAdd');
	$router->put('toko/update', 'TokoPetani@UpdateToko');
	$router->post('toko/delete/{id_toko}', 'TokoPetani@DeleteToko');

	// Add Produk
	$router->post('toko/produk/add', 'TokoPetani@ProdukTokoAdd');
	$router->put('toko/produk/update', 'TokoPetani@UpdateTokoProduk');

	// Logout Users
	$router->get('logout', 'ProfileController@Logout');
});
$router->get('toko/test', 'Api\TokoPetani@test');

// Test data 1 minggu terakhir
$router->get('bulan/{tanggal}', 'Api\TokoPetani@bulan');
