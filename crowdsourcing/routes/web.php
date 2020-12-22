<?php

use Illuminate\Support\Facades\Route;
use App\HTTP\Controllers\userController;
use App\HTTP\Controllers\Buyer\buyerController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('homepage');
});

Route::get('/login', [userController::class, 'loginIndex']);
Route::post('/login', [userController::class, 'verifyUser']);

Route::get('/logout', [userController::class, 'logout']);

Route::get('/registration', [userController::class, 'registrationIndex']);
Route::post('/registration', [userController::class, 'registrationSubmit']);

Route::get('/reset', [userController::class, 'reset']);
Route::post('/reset', [userController::class, 'resetSubmit']);

Route::group(['middleware'=>['sessionCheck']], function(){
	Route::get('/dashboard', [buyerController::class, 'dashboardIndex']);
});

