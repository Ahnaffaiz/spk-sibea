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
    return view('pages.home');
})->name('home');

Route::name('admin.')->middleware('is_admin')->prefix('/admin')->group(function () {
    Route::controller(MenuController::class)->group(function(){
        Route::get('/beasiswa','beasiswa')->name('beasiswa');
        Route::get('/beasiswa-create','beasiswaCreate')->name('beasiswa-create');
        Route::get('/beasiswa-update/{id}','beasiswaUpdate')->name('beasiswa-update');
        Route::get('/kriteria-promethee','kriteriaPromethee')->name('kriteria-promethee');
        Route::get('/kriteria-ahp','kriteriaAhp')->name('kriteria-ahp');
        Route::get('/pendaftar','pendaftar')->name('pendaftar');
        Route::get('/pendaftar/{id}/import','pendaftarImport')->name('pendaftar.import');
        Route::get('/skoring','skoring')->name('skoring');
        Route::get('/skoring/promethee/{id}','promethee')->name('skoring.promethee');
        Route::get('/skoring/ahp/{id}','ahp')->name('skoring.ahp');
        Route::get('/skoring/saw/{id}','saw')->name('skoring.saw');
        Route::get('/evaluasi','evaluasi')->name('evaluasi');
        Route::get('/evaluasi-detail/{id}','evaluasiDetail')->name('evaluasi.detail');
    });
});
Auth::routes();
