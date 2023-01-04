<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewLocationController;

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

Route::get('/',[AuthController::class, 'home']);
Route::get('/login',[AuthController::class,'login']);
Route::post('/loginUser',[AuthController::class,'loginUser']);

Route::get('/register',[AuthController::class, 'register']);
Route::post('/register',[AuthController::class, 'saveDetails']);
Route::get('/redirect',[AuthController::class, 'redirect']);

Route::get('/locations',[NewLocationController::class, 'location']);
Route::post('/create_location',[NewLocationController::class, 'newLocation']);
Route::get('/location_details/{id}',[NewLocationController::class, 'details']);

Route::get('/delete/{id}',[NewLocationController::class, 'delete']);
Route::get('/logout',[AuthController::class,'logout']);
Route::get('/search',[AuthController::class,'search']);
