<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\LoginController;

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

// Route::get('/tentang_kami', function () {
//     return view('tentang_kami', [
//         "title" => "| Tentang Kami"
//     ]);
// });
Route::get('/tentang_kami', [AboutUsController::class, 'show']);

// Route::get('/mitra', function () {
//     return view('mitra', [
//         "title" => "| Mitra"
//     ]);
// });
Route::get('/mitra', [MitraController::class, 'show']);

// Route::get('/produk', function () {
//     return view('produk', [
//         "title" => "| Produk"
//     ]);
// });
Route::get('/produk', [ProductController::class, 'list_product']);

// Route::get('/artikel', function () {
//     return view('artikel', [
//         "title" => "| Artikel"
//     ]);
// });
Route::get('/artikel', [ArticleController::class, 'show']);

// Route::get('/detail_artikel', function () {
//     return view('detail_artikel', [
//         "title" => "| Detail Artikel"
//     ]);
// });
Route::get('/detail-artikel/{id}', [ArticleController::class, 'detail_article']);

// Route::get('/detail_produk', function () {
//     return view('detail_produk', [
//         "title" => "| Detail Produk"
//     ]);
// });
Route::get('/detail_produk/{id}', [ProductController::class, 'details_product']);


Route::resource('admin-products', 'App\Http\Controllers\ProductController');
Route::resource('admin-mitras', 'App\Http\Controllers\MitraController');
Route::resource('admin-articles', 'App\Http\Controllers\ArticleController');
Route::resource('admin-teams', 'App\Http\Controllers\TeamController');
Route::resource('admin-categories', 'App\Http\Controllers\CategoryController');
Route::resource('admin-about_us', 'App\Http\Controllers\AboutUsController');
Route::resource('users', 'App\Http\Controllers\UserController');
// Route::get('/user/{id}/edit', [UserController::class, 'edit']);
// Route::put('/user/{id}', [PostController::class, 'update']);

Auth::routes([
    'reset' => true,
]);

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/db_mitra', function () {
    return view('admin.dashboard_mitra', [
        "title" => "| Dashboard"
    ]);
});
Route::get('/db_product', function () {
    return view('admin.dashboard_mitra_product', [
        "title" => "| Product"
    ]);
});
Route::get('/db_toko', function () {
    return view('admin.dashboard_mitra_toko', [
        "title" => "| Mitra"
    ]);
});
