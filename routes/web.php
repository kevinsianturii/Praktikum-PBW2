<?php

use App\Http\Controllers\CollectionsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

//user
    Route::get('/user', [UserController::class, 'index'])->name('user.daftarPengguna');
    Route::get('/userRegistration', [UserController::class, 'create'])->name('user.registrasi');
    Route::post('/userStore', [UserController::class, 'store'])->name('user.storePengguna');
    Route::get('/userView/{user}', [UserController::class, 'show'])->name('user.infoPengguna'); 
    Route::get('/editUser/{user}', [UserController::class, 'edit'])->name('user.editUser');
    Route::post('/updateUser/{user}', [UserController::class, 'update'])->name('user.editUpdate');
   

//Koleksi buku
    Route::get('/koleksi', [CollectionsController::class, 'index'])->name('koleksi.daftarKoleksi');
    Route::get('/koleksiTambah', [CollectionsController::class, 'create'])->name('koleksi.registrasi');
    Route::post('/koleksiStore', [CollectionsController::class, 'store'])->name('koleksi.storeKoleksi');
    Route::get('/koleksiView/{collection}', [CollectionsController::class, 'show'])->name('koleksi.infoKoleksi');
    Route::post('/updateKoleksi/{collection}', [CollectionsController::class, 'show'])->name('koleksi.updateKoleksi');
    Route::get('/editKoleksi/{collection}', [CollectionsController::class, 'edit'])->name('koleksi.editKoleksi');
   

    Route::get('/getAllCollections', [CollectionController::class,'getAllCollections'])->middleware(['auth', 'verified']);

// 6706220055_Kevin Sianturi_4604

});


require __DIR__.'/auth.php';


