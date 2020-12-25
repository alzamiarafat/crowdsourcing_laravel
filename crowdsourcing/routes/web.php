<?php

use App\Http\Controllers\Admin\adminController;
use Illuminate\Support\Facades\Route;
use App\HTTP\Controllers\userController;
use App\HTTP\Controllers\Buyer\buyerController;



Route::get('/', function () {
    return view('homepage', [ 'title' => "Home | Crowdsourcing"]);
});

Route::get('/login', [userController::class, 'loginIndex'])->name('login');
Route::post('/login', [userController::class, 'verifyUser']);

Route::get('/logout', [userController::class, 'logout'])->name('logout');

Route::get('/registration', [userController::class, 'registrationIndex'])->name('registration');
Route::post('/registration', [userController::class, 'registrationSubmit']);

Route::get('/reset', [userController::class, 'reset'])->name('reset');
Route::post('/reset', [userController::class, 'resetSubmit']);


// Admin routes
Route::group(['middleware'=>['sessionCheck']] , function () {
	Route::get('/admin/dashboard', [adminController::class, 'dashboard'])->name('adminDashboard');
});


//  Buyer routes
Route::group(['middleware'=>['sessionCheck']], function(){

	Route::get('/dashboard', [buyerController::class, 'dashboardIndex'])->name('dashboard');
	
	Route::get('/profile/{id}', [buyerController::class, 'profile'])->name('profile');
	Route::post('/profile/{id}', [buyerController::class, 'uploadImage']);

	Route::get('/edit_profile/{id}', [buyerController::class, 'editProfile'])->name('edit_profile');
	Route::post('/edit_profile/{id}', [buyerController::class, 'updateProfile']);

	Route::get('/post_list', [buyerController::class, 'postList'])->name('post_list');

	Route::get('/create_post', [buyerController::class, 'createPostIndex'])->name('create_post');
	Route::post('/create_post', [buyerController::class, 'createPost']);


	
});

