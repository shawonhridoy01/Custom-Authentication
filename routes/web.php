<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;

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
    return view('welcome');
});

Route::get('/login',[authController::class,'login'])->middleware('ifLoggedIn');
Route::get('/logout',[authController::class,'logout']);
Route::get('/dashboard',[authController::class,'dashboard'])->middleware('authCheck');
Route::post('/login',[authController::class,'loginUser'])->name('login.login');
Route::get('/registration',[authController::class,'registration'])->middleware('ifLoggedIn');
Route::post('/registration',[authController::class,'registrationUser'])->name('registration.registration');
