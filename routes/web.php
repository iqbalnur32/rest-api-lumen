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

	// Web CTF
	$router->get('/challange', 'ChallangeController@index');
	$router->post('/challange', 'ChallangeController@CheckSubmitFlag');
	$router->get('/scoreboard', 'ScoreboardController@scoreboard');
	$router->get('/profile', 'ScoreboardController@profile');
	$router->post('/profile/update', 'UsersController@updateProfile');
	$router->get('/notification', 'UsersController@pengumumanUsers');
});

// Admin Routing 
$router->group(['middleware' => ['session_admin', 'is_admin'], 'prefix' => 'admin', 'namespace' => 'Admin'], function() use($router) {
	$router->get('/', 'AdminController@index');

	// Category CTF 
	$router->get('/ctf-category', 'CategoryCTF@category');
	$router->post('/ctf-category', 'CategoryCTF@Addcategory');
	$router->get('/ctf-category/edit/{id_category}', 'CategoryCTF@categoryEdit');
	$router->put('/ctf-category/edit/{id_category}', 'CategoryCTF@categoryEditProcess');
	$router->get('/ctf-category/delete/{id_category}', 'CategoryCTF@categoryDelete');

	// Challange CTF
	$router->get('/add-challange', 'AdminController@addChallange');
	$router->post('/add-challange', 'AdminController@addChallangeProcess');

	// Pengumuman CTF
	$router->get('/add-pengumuman', 'AdminController@addPengumuman');
	$router->post('/add-pengumuman', 'AdminController@addPengumumanProcess');
	$router->get('/add-pengumuman/edit/{id_pengumuman}', 'AdminController@editPengumuman');
	$router->put('/add-pengumuman/edit/{id_pengumuman}', 'AdminController@editPengumumanProcess');

	// Management User
	$router->get('/management-user', 'AdminController@managementUser');
	$router->post('/management-user/add', 'AdminController@manegemntUserAdd');
	$router->get('/management-user/edit/{id_users}', 'AdminController@managementEdit');
	$router->put('/management-user/edit/{id_users}', 'AdminController@managementEditProcess');

});