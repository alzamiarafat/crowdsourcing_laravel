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
	Route::get('/admin/profileview/{id}', [adminController::class, 'ViewProfile'])->name('profileView');

	Route::get('/reset', [adminController::class, 'resetPassword'])->name('resetPassword');
	Route::post('/changePassword', [adminController::class, 'changePassword'])->name('changePassword');
});


//  Buyer routes
Route::group(['middleware'=>['sessionCheck']], function(){

	Route::get('/dashboard', [buyerController::class, 'dashboardIndex'])->name('dashboard');
	
	Route::get('/profile/{id}', [buyerController::class, 'profile'])->name('profile');
	Route::post('/profile/{id}', [buyerController::class, 'uploadImage']);

	Route::get('/edit_profile/{id}', [buyerController::class, 'editProfile'])->name('edit_profile');
	Route::post('/edit_profile/{id}', [buyerController::class, 'updateProfile']);

	Route::get('/post_list', [buyerController::class, 'postList'])->name('post_list');
	Route::get('/sellers', [buyerController::class, 'sellerList'])->name('sellers');


	Route::get('/create_post', [buyerController::class, 'createPostIndex'])->name('create_post');
	Route::post('/create_post', [buyerController::class, 'createPost']);

	Route::get('/post_delete/{id}', [buyerController::class, 'postDelete'])->name('post_delete');

	Route::get('/post_available/{id}', [buyerController::class, 'postAvailable'])->name('post_available');

	Route::get('/post_unavailable/{id}', [buyerController::class, 'postUnavailable'])->name('post_unavailable');

	Route::get('/seller_profile/{id}', [buyerController::class, 'sellerProfile'])->name('seller_profile');

	//Route::post('/create_post', [buyerController::class, 'createPost']);


	
});

