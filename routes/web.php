<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunController;

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
    return view('index');
});
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::get('/register', function () {
    return view('register');
})->name('register');


Route::get('/kuis', function () {
    return view('kuis');
})->name('kuis');

Route::get('/daftar-kuis}', function () {
    return view('listkuis');
})->name('listkuis');

Route::get('/selesai', function () {
    return view('selesai');
})->name('selesai');

Route::get('/pengajar', function () {
    return view('pengajar');
})->name('pengajar');

Route::get('/buat-kuis', function () {
    return view('buat-kuis');
})->name('buat-kuis');

Route::post('/register', [AkunController::class, 'store'])->name('akun.store');
Route::get('/login', [AkunController::class, 'login'])->name('login');
Route::post('/login', [AkunController::class, 'authenticate'])->name('authenticate');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
