<?php

use App\Http\Controllers\AdminController;
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

Route::get('/',[AdminController::class,'provinsi']);

Route::prefix('admin')->group(function (){

    Route::get('/provinsi',[AdminController::class,'provinsi']);
    Route::get('/print_provinsi',[AdminController::class,'print_provinsi']);

    Route::post('/input_provinsi',[AdminController::class,'input_provinsi']);
    Route::post('/edit_provinsi',[AdminController::class,'edit_provinsi']);
    Route::post('/hapus_provinsi',[AdminController::class,'hapus_provinsi']);

    Route::get('/kelurahan',[AdminController::class,'kelurahan']);
    Route::get('/print_kelurahan',[AdminController::class,'print_kelurahan']);

    Route::post('/input_kelurahan',[AdminController::class,'input_kelurahan']);
    Route::post('/edit_kelurahan',[AdminController::class,'edit_kelurahan']);
    Route::post('/hapus_kelurahan',[AdminController::class,'hapus_kelurahan']);

    Route::get('/kecamatan',[AdminController::class,'kecamatan']);
    Route::get('/print_kecamatan',[AdminController::class,'print_kecamatan']);
    Route::post('/input_kecamatan',[AdminController::class,'input_kecamatan']);
    Route::post('/edit_kecamatan',[AdminController::class,'edit_kecamatan']);
    Route::post('/hapus_kecamatan',[AdminController::class,'hapus_kecamatan']);

    Route::get('/pegawai',[AdminController::class,'pegawai']);
    Route::get('/print_pegawai',[AdminController::class,'print_pegawai']);

    Route::post('/input_pegawai',[AdminController::class,'input_pegawai']);
    Route::post('/edit_pegawai',[AdminController::class,'edit_pegawai']);
    Route::post('/hapus_pegawai',[AdminController::class,'hapus_pegawai']);

});