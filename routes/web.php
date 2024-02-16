<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\backend\BackendSeniJenisController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\frontend\JasaController;
use App\Http\Controllers\frontend\ProdukController;
use App\Http\Controllers\frontend\RiwayatController;
use App\Http\Controllers\backend\PemesananJasaController;
use App\Http\Controllers\backend\PemesananProdukController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/**
 * Auth
 */
 Route::get('/',[AuthController::class,'login'])->name('login');
 Route::post('/',[AuthController::class,'login_action'])->name('login_action');
 Route::get('/registrasi',[AuthController::class,'registrasi'])->name('registrasi');
 Route::post('/registrasi',[AuthController::class,'registrasi_action'])->name('registrasi_action');
 Route::get('/logout',[AuthController::class,'logout'])->name('logout');


/**
 * Frontend
 */
Route::middleware(['auth','OnlyPelanggan'])->group(function(){
    Route::get('/beranda',function(){
       return view('frontend.pages.beranda');
    })->name('beranda');

    Route::prefix('riwayat')->group(function(){
        Route::get('pemesanan',[RiwayatController::class,'riwayat_pemesanan'])->name('riwayat.pemesanan');
        Route::get('search',[RiwayatController::class,'search'])->name('search');
        Route::post('search',[RiwayatController::class,'search_action'])->name('search_action');
    });

    //  produk
   Route::prefix('produk')->group(function(){
       Route::get('/',[ProdukController::class,'produk'])->name('produk');
       Route::get('sort',[ProdukController::class,'produk_sort'])->name('produk_sort');
       Route::get('detail/{id}',[ProdukController::class,'detail_produk'])->name('detail_produk');
       Route::get('pemesanan/{id}',[ProdukController::class,'pemesanan_produk'])->name('pemesanan_produk');
       Route::post('pemesanan/{id}',[ProdukController::class,'store_pemesanan_produk'])->name('pemesanan_produk.store');
       Route::put('pemesanan/{id}',[ProdukController::class,'update_pemesanan_produk'])->name('pemesanan_produk.update');
       Route::get('riwayat/{id}',[ProdukController::class,'riwayat_produk'])->name('riwayat_produk');
       Route::get('kode_booking',[ProdukController::class,'kode_booking'])->name('produk.kode_booking');
   });

   //  jasa
   Route::prefix('jasa')->group(function(){
       Route::get('/',[JasaController::class,'jasa'])->name('jasa');
       Route::get('sort',[JasaController::class,'jasa_sort'])->name('jasa_sort');
       Route::get('pemesanan/{id}',[JasaController::class,'pemesanan_jasa'])->name('pemesanan_jasa');
       Route::post('pemesanan/{id}',[JasaController::class,'store_pemesanan_jasa'])->name('pemesanan_jasa.store');
       Route::put('pemesanan/{id}',[JasaController::class,'update_pemesanan_jasa'])->name('pemesanan_jasa.update');
       Route::get('riwayat/{id}',[JasaController::class,'riwayat_jasa'])->name('riwayat_jasa');
       Route::get('kode_booking',[JasaController::class,'kode_booking'])->name('jasa.kode_booking');
   });
});

 /**
  * Backend
  */
Route::prefix('backend')->middleware(['auth','OnlyAdmin'])->group(function(){
    // dashboard
    Route::get('/dashboard',function(){
        return view('backend.pages.dashboard.dashboard');
     })->name('dashboard');

    //  user
    Route::resource('user',UserController::class)->except('create','store');
    Route::put('user/update_status/{id}',[UserController::class,'update_status'])->name('user.update_status');

    // jenis seni
    Route::resource('jenis-seni',BackendSeniJenisController::class);

    // produk
     Route::resource('produk','App\Http\Controllers\backend\ProdukController');

     // jasa
     Route::resource('jasa','App\Http\Controllers\backend\JasaController');

     //  pemesanan jasa
     Route::resource('pemesanan-jasa',PemesananJasaController::class)->except('create','store');

     //  pemesanan produk
     Route::resource('pemesanan-produk',PemesananProdukController::class)->except('create','store');
    });


