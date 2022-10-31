<?php
use App\Models\Post;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\ProjectController;
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

Route::get('/admin', function () {
    return view('admin.dashboard');
});
Route::get('/admin/mastersiswa', function () {
    return view('admin.mastersiswa');
});

// admin 

Route::middleware('auth')->group(function () {
Route::get('/admin', [DashboardController::class , 'index'] );
Route::post('/logout', [logincontroller::class, 'logout'])->name('logout');
Route::get('/mastersiswa/{id_siswa}/hapus', [SiswaController::class, 'hapus'])->name('mastersiswa.hapus');
Route::resource('/admin/mastersiswa', SiswaController::class);
Route::resource('/admin/mastercontact', ContactController::class);
Route::resource('/admin/masterproject', ProjectController::class);

});

// guest

Route::middleware('guest')->group(function() {
Route::get('/login', [logincontroller::class , 'index'])->name('login');
Route::post('/login', [logincontroller::class, 'authenticate'])->name('login.auth');
Route::get('/', function () { return view('home');});
Route::get('/about', function () { return view('about');}); 
Route::get('/project', function () { return view('project'); });
Route::get('/contact', function () { return view('contact'); });

});