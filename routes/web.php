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

Route::get('/createuser',           [UserController::class,'create'])->name('user.create');
Route::get('/user',                 [UserController::class,'index'])->name('user.index');
Route::post('/store',               [UserController::class,'store'])->name('user.store');
Route::get('/datauser/{id}',        [UserController::class,'edit'])->name('user.edit');
Route::put('/update/{id}',          [UserController::class,'update'])->name('user.update');
Route::get('/deleteuser/{id}',      [UserController::class,'softdelete'])->name('user.softdelete');

});
Route::group(['middleware' => ['auth','Role:admin,sekretaris']],function(){

Route::get('/dashboard',            [DashboardController::class,'index'])->name('dashboard');
Route::get('/anggota',              [AnggotaController::class,'index'])->name('anggota.index');
Route::get('/createanggota',        [AnggotaController::class,'create'])->name('anggota.create');
Route::post('/postanggota',         [AnggotaController::class,'store'])->name('anggota.store');//aksi store nambah
Route::get('/editanggota/{id}',     [AnggotaController::class,'edit'])->name('anggota.edit');//halaman edit
Route::put('/updateanggota/{id}',   [AnggotaController::class,'update'])->name('anggota.update');
Route::get('/deleteanggota/{id}',   [AnggotaController::class,'softdelete'])->name('anggota.softdelete');

Route::get('/anakyatim',            [AnakController::class,'index'])->name('anak.index');
Route::get('/createanak',           [AnakController::class,'create'])->name('anak.create');
Route::post('/postanak',            [AnakController::class,'store'])->name('anak.store');
Route::get('/editanak/{id}',        [AnakController::class,'edit'])->name('anak.edit');
Route::put('/updateanak/{id}',      [AnakController::class,'update'])->name('anak.update');
Route::get('/deleteanak/{id}',      [AnakController::class,'softdelete'])->name('anak.softdelete');

Route::get('/setoranIn',            [SetoranInController::class,'index'])->name('in.index');
Route::get('/createsetoranIn',      [SetoranInController::class,'create'])->name('in.create');
Route::post('/postsetoranIn',       [SetoranInController::class,'store'])->name('in.store');
Route::get('/editsetoranIn/{id}',   [SetoranInController::class,'edit'])->name('in.edit');
Route::put('/updatesetoranIn/{id}', [SetoranInController::class,'update'])->name('in.update');
Route::get('/deletesetoranIn/{id}', [SetoranInController::class,'softdelete'])->name('in.softdelete');

Route::get('/setoranOut',           [SetoranOutController::class,'index'])->name('out.index');
Route::get('/createsetoranOut',     [SetoranOutController::class,'create'])->name('out.create');
Route::post('/postsetoranOut',      [SetoranOutController::class,'store'])->name('out.store');
Route::get('/editsetoranOut/{id}',  [SetoranOutController::class,'edit'])->name('out.edit');
Route::put('/updatesetoranOut/{id}',[SetoranOutController::class,'update'])->name('out.update');
Route::get('/deletesetoranOut/{id}',[SetoranOutController::class,'softdelete'])->name('out.delete');

});

Route::get('/login',                [AuthController::class,'login'])->name('login');
Route::post('postlogin',            [AuthController::class,'postlogin'])->name('postlogin');
Route::get('/logout',               [AuthController::class,'logout'])->name('logout');
Route::get('/',                     [HomeController::class,'index'])->name('home');
