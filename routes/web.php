<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\TopUpController;
use App\Http\Controllers\SaldosController;
use App\Http\Controllers\ProfileController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make somethinng great!
|
*/

Route::get('/dashboard', [ProfileController::class,'image'])
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/saldo', [SaldosController::class,'saldo'])
    ->middleware(['auth', 'verified'])->name('saldo');

Route::get('/topup_saldo', [SaldosController::class,'topup_saldo'])
    ->middleware(['auth', 'verified'])->name('topup_saldo');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::middleware('auth')->group(function () {

    Route::get('/admin', [AdminController::class, 'index'])
    ->middleware(['auth', 'verified', 'admin'])
    ->name('admin');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/topup_saldo',[SaldosController::class, 'topup']);
    
    Route::get('/gi',[TopUpController::class,'gi_topup']);
    
    Route::get('/hsr',[TopUpController::class,'hsr_topup']);
    
    Route::get('/ml',[TopUpController::class,'ml_topup']);
    
    Route::get('/coc',[TopUpController::class,'coc_topup']);
    
    Route::post('/store',[TopUpController::class,'store']);

    Route::get('/admin/delete/{id}',[AdminController::class, 'delete']);
    Route::get('/admin/update/{id}', [AdminController::class, 'update']);

    Route::post('/admin/edit/{id}', [AdminController::class, 'edit']);

    Route::get('/admin/tambah', [AdminController::class, 'create']);
    Route::post('/admin/store', [AdminController::class, 'store']);


});
require __DIR__.'/auth.php';

Route::get('/', function(){
    return view('index');
});



// Route::get('/topup/{game_slug}', [GamesController::class, 'topup'])->name('topup.game');

// Route::get('/{game_slug}', [GamesController::class, 'showTopupForm'])->name('topup.form');

// Route::post('/{game_slug}', [GamesController::class, 'processTopup'])->name('topup.process');

// Route::post('/invoice', [InvoiceController::class, 'store']);
// Route::get('/invoice', [InvoiceController::class, 'store']);

// Route::resource('/invoice', InvoiceController::class);
