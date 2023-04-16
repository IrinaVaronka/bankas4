<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController as CL;
use App\Http\Controllers\OrderController as Ac;

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

Route::prefix('clients')->name('clients-')->group(function () {
    Route::get('/', [CL::class, 'index'])->name('index');
    Route::get('/create', [CL::class, 'create'])->name('create');
    Route::post('/create', [CL::class, 'store'])->name('store');
    Route::get('/{client}', [CL::class, 'show'])->name('show');
    Route::get('/editPerson/{client}', [CL::class, 'editPerson'])->name('editPerson');
    Route::put('/editPerson/{client}', [CL::class, 'updatePerson'])->name('updatePerson');
    Route::get('/edit/{client}', [CL::class, 'edit'])->name('edit');
    Route::put('/edit/{client}', [CL::class, 'update'])->name('update');
    Route::get('/editDeduct/{client}', [CL::class, 'editDeduct'])->name('editDeduct');
    Route::put('/editDeduct/{client}', [CL::class, 'updateDeduct'])->name('updateDeduct');
    Route::delete('/delete/{client}', [CL::class, 'destroy'])->name('delete');
    
    });

    Route::prefix('accounts')->name('accounts-')->group(function () {
        Route::get('/', [Ac::class, 'index'])->name('index');
        Route::get('/create', [Ac::class, 'create'])->name('create');
        Route::post('/create', [Ac::class, 'store'])->name('store');
        Route::get('/{account}', [Ac::class, 'show'])->name('show');
        Route::get('/editPerson/{account}', [Ac::class, 'editPerson'])->name('editPerson');
        Route::put('/editPerson/{account}', [Ac::class, 'updatePerson'])->name('updatePerson');
        Route::get('/edit/{account}', [Ac::class, 'edit'])->name('edit');
        Route::put('/edit/{account}', [Ac::class, 'update'])->name('update');
        Route::get('/editDeduct/{account}', [Ac::class, 'editDeduct'])->name('editDeduct');
        Route::put('/editDeduct/{account}', [Ac::class, 'updateDeduct'])->name('updateDeduct');
        Route::delete('/delete/{account}', [Ac::class, 'destroy'])->name('delete');
        
        });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
