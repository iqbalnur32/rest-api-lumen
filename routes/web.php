<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.

/*$router->get('/', function () use ($router) {
    return $router->app->version();
});*/

// Login Controller
// $router->get('/login', 'AuthController@login');
$router->post('/login', 'AuthController@loginProcess');

// Register Controller
$router->get('/register', 'AuthController@register');
$router->post('/register', 'AuthController@registerProcess');

//Logout 
$router->get('/logout', 'AuthController@Logout');

// Landing Page 
$router->get('/', 'Users\HomeController@landingPage');

// Users Controller
$router->group(['middleware' => ['session', 'is_users'], 'prefix' => 'users', 'namespace' => 'Users'], function() use($router) {
	$router->get('/', 'HomeController@index');
	
	// Submit Flag 
	$router->get('/challange', 'ChallangeController@index');
	$router->post('/challange', 'ChallangeController@CheckSubmitFlag');
	
	// ScoreBoard
	$router->get('/scoreboard', 'ScoreboardController@scoreboard');
	
	// Profile Users
	$router->get('/profile', 'ScoreboardController@profile');
	$router->post('/profile/update', 'UsersController@updateProfile');
	
	// Pengumuman Users
	$router->get('/notification', 'UsersController@pengumumanUsers');
	
	// Get Score 
	$router->get('/get-score', 'ScoreboardController@getScores');

	// Static Data Monitoring Users
	$router->get('/static/solved', 'HomeController@solvedStatic');

});

// Admin Routing 
$router->group(['middleware' => ['session_admin', 'is_admin'], 'prefix' => 'admin', 'namespace' => 'Admin'], function() use($router) {
	$router->get('/', 'AdminController@index');
	$router->get('/lastlogin/users/{tanggal}', 'AdminController@staticUser');
	$router->get('/top-score/users/{tanggal}', 'AdminController@topScore');

	//Setting Profile Admin
	$router->get('/settings', 'AdminController@settingsIndex'); 
	$router->post('/settings', 'AdminController@settingsProccess'); 

	// Category CTF 
	$router->get('/ctf-category', 'CategoryCTF@category');
	$router->post('/ctf-category', 'CategoryCTF@Addcategory');
	$router->get('/ctf-category/edit/{id_category}', 'CategoryCTF@categoryEdit');
	$router->put('/ctf-category/edit/{id_category}', 'CategoryCTF@categoryEditProcess');
	$router->get('/ctf-category/delete/{id_category}', 'CategoryCTF@categoryDelete');

	// Challange CTF
	$router->get('/add-challange', 'AdminController@addChallange');
	$router->post('/add-challange', 'AdminController@addChallangeProcess');
	$router->get('/add-challange/edit/{id_task}', 'AdminController@addChallangeEdit');
	$router->put('/add-challange/edit/{id_task}', 'AdminController@addChallangeEditProcess');
	$router->get('/add-challange/delete/{id_task}', 'AdminController@addChallangeDelete');

	// Pengumuman CTF
	$router->get('/add-pengumuman', 'AdminController@addPengumuman');
	$router->post('/add-pengumuman', 'AdminController@addPengumumanProcess');
	$router->get('/add-pengumuman/edit/{id_pengumuman}', 'AdminController@editPengumuman');
	$router->put('/add-pengumuman/edit/{id_pengumuman}', 'AdminController@editPengumumanProcess');
	$router->get('/add-pengumuman/delete/{id_pengumuman}', 'AdminController@pengumumanDelete');

	// Management User
	$router->get('/management-user', 'AdminController@managementUser');
	$router->post('/management-user/add', 'AdminController@manegemntUserAdd');
	$router->get('/management-user/edit/{id_users}', 'AdminController@managementEdit');
	$router->put('/management-user/edit/{id_users}', 'AdminController@managementEditProcess');
	$router->get('/management-user/delete/{id_users}', 'AdminController@managementDelete');

});