<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Auth;

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

Route::name('admin.')->middleware('is_admin')->prefix('/admin')->group(function () {
    Route::controller(MenuController::class)->group(function(){
        Route::get('/beasiswa','beasiswa')->name('beasiswa');
        Route::get('/kriteria','kriteria')->name('kriteria');
        Route::get('/pendaftar','pendaftar')->name('pendaftar');
        Route::get('/pendaftar/{id}/import','pendaftarImport')->name('pendaftar.import');
        Route::get('/skoring','skoring')->name('skoring');
        Route::get('/skoring/promethee/{id}','promethee')->name('skoring.promethee');
    });
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
