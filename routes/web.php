<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\KategoriController;

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
    return view('login');
});



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');


Route::middleware(['auth'])->group(function(){
    Route::get('barangmasuk', [BarangMasukController::class, 'index'])->name('barangmasuk.index');
    Route::get('barangmasuk/create', [BarangMasukController::class, 'create'])->name('barangmasuk.create');
    Route::post('barangmasuk.store', [BarangMasukController::class, 'store'])->name('barangmasuk.store');
    Route::delete('barangmasuk/destroy/{id}', [BarangMasukController::class, 'destroy'])->name('barangmasuk.destroy');
    Route::get('barangmasuk/edit/{id}', [BarangMasukController::class, 'edit'])->name('barangmasuk.edit');
    Route::patch('barangmasuk/update/{id}', [BarangMasukController::class, 'update'])->name('barangmasuk.update');

    Route::get('barangkeluar', [BarangKeluarController::class, 'index'])->name('barangkeluar.index');
    Route::get('barangkeluar/create', [BarangKeluarController::class, 'create'])->name('barangkeluar.create');
    Route::post('barangkeluar.store', [BarangKeluarController::class, 'store'])->name('barangkeluar.store');
    Route::delete('barangkeluar/destroy/{id}', [BarangKeluarController::class, 'destroy'])->name('barangkeluar.destroy');
    Route::get('barangkeluar/edit/{id}', [BarangKeluarController::class, 'edit'])->name('barangkeluar.edit');
    Route::patch('barangkeluar/update/{id}', [BarangKeluarController::class, 'update'])->name('barangkeluar.update');

    Route::get('pesanan', [PesananController::class, 'index'])->name('pesanan.index');
    Route::get('pesanan/create', [PesananController::class, 'create'])->name('pesanan.create');
    Route::post('pesanan.store', [PesananController::class, 'store'])->name('pesanan.store');
    Route::delete('pesanan/destroy/{id}', [PesananController::class, 'destroy'])->name('pesanan.destroy');
    Route::get('pesanan/edit/{id}', [PesananController::class, 'edit'])->name('pesanan.edit');
    Route::patch('pesanan/update/{id}', [PesananController::class, 'update'])->name('pesanan.update');

    Route::get('stok', [StokController::class, 'index'])->name('stok.index');

    Route::get('kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::get('kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
    Route::post('kategori.store', [KategoriController::class, 'store'])->name('kategori.store');
    Route::delete('kategori/destroy/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
    Route::get('kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::patch('kategori/update/{id}', [KategoriController::class, 'update'])->name('kategori.update');

    Route::get('user', [UserController::class, 'index'])->name('user.index');
    Route::get('user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('user.store', [UserController::class, 'store'])->name('user.store');
    Route::delete('user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::patch('user/update/{id}', [UserController::class, 'update'])->name('user.update');

});


   


require __DIR__.'/auth.php';
