<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/home', function () {
    return view('home', [
        "title" => ""
    ]);
});

Route::get('/tentang_kami', function () {
    return view('tentang_kami', [
        "title" => "| Tentang Kami"
    ]);
});

Route::get('/mitra', function () {
    return view('mitra', [
        "title" => "| Mitra"
    ]);
});

Route::get('/detail_artikel', function () {
    return view('detail_artikel', [
        "title" => "| Detail Artikel"
    ]);
});

Auth::routes();
