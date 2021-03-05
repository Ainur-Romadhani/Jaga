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

Route::get('/createuser',           [UserController::class,'create']);
Route::get('/user',                 [UserController::class,'index']);
Route::post('/store',               [UserController::class,'store']);
Route::get('/datauser/{id}',        [UserController::class,'edit']);
Route::put('/update/{id}',          [UserController::class,'update']);
Route::get('/deleteuser/{id}',      [UserController::class,'softdelete']);

Route::get('/anggota',              [AnggotaController::class,'index']);
Route::get('/createanggota',        [AnggotaController::class,'create']);
Route::post('/postanggota',         [AnggotaController::class,'store']);//aksi store nambah
Route::get('/editanggota/{id}',     [AnggotaController::class,'edit']);//halaman edit
Route::put('/updateanggota/{id}',   [AnggotaController::class,'update']);
Route::get('/deleteanggota/{id}',   [AnggotaController::class,'softdelete']);

Route::get('/anakyatim',            [AnakController::class,'index']);
Route::get('/createanak',           [AnakController::class,'create']);
Route::post('/postanak',            [AnakController::class,'store']);
Route::get('/editanak/{id}',        [AnakController::class,'edit']);
Route::put('/updateanak/{id}',      [AnakController::class,'update']);
Route::get('/deleteanak/{id}',      [AnakController::class,'softdelete']);

Route::get('/setoranIn',            [SetoranInController::class,'index']);
Route::get('/createsetoranIn',      [SetoranInController::class,'create']);
Route::post('/postsetoranIn',       [SetoranInController::class,'store']);
Route::get('/editsetoranIn/{id}',   [SetoranInController::class,'edit']);
Route::put('/updatesetoranIn/{id}', [SetoranInController::class,'update']);
Route::get('/deletesetoranIn/{id}', [SetoranInController::class,'softdelete']);

Route::get('/setoranOut',           [SetoranOutController::class,'index']);
Route::get('/createsetoranOut',     [SetoranOutController::class,'create']);
Route::post('/postsetoranOut',      [SetoranOutController::class,'store']);
Route::get('/editsetoranOut/{id}',  [SetoranOutController::class,'edit']);
Route::put('/updatesetoranOut/{id}',[SetoranOutController::class,'update']);
Route::get('/deletesetoranOut/{id}',[SetoranOutController::class,'softdelete']);

});
Route::get('/login',                [AuthController::class,'login']);
Route::post('postlogin',            [AuthController::class,'postlogin']);
Route::get('/logout',               [AuthController::class,'logout']);
Route::get('/',                     [HomeController::class,'index']);
Route::get('/dashboard',            [DashboardController::class,'index']);
