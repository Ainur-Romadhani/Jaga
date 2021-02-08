<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

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

Route::get('/085230784187', function () {
    // return view('welcome');
    echo "rahasia";
});

Route::group(['middleware' => ['auth','Role:admin']],function(){

Route::get('/createuser',[UserController::class,'create']);
Route::get('/user',[UserController::class,'index']);
Route::post('/store',[UserController::class,'store']);
Route::get('/datauser/{id}',[UserController::class,'edit']);
Route::put('/update/{id}',[UserController::class,'update']);

});
Route::get('/login',[AuthController::class,'login']);
Route::post('postlogin',[AuthController::class,'postlogin']);
Route::get('/logout',[AuthController::class,'logout']);
Route::get('/',[DashboardController::class,'index']);
