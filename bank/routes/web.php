<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController as CL;
use App\Http\Controllers\AccountController as AC;

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

    // Route::prefix('accounts')->name('accounts-')->group(function () {
    //     Route::get('/', [AC::class, 'index'])->name('index');
    //     Route::get('/create', [AC::class, 'create'])->name('create');
    //     Route::post('/create', [AC::class, 'store'])->name('store');
    //     Route::get('/{account}', [AC::class, 'show'])->name('show');
    //     Route::get('/editPerson/{account}', [AC::class, 'editPerson'])->name('editPerson');
    //     Route::put('/editPerson/{account}', [AC::class, 'updatePerson'])->name('updatePerson');
    //     Route::get('/edit/{account}', [AC::class, 'edit'])->name('edit');
    //     Route::put('/edit/{account}', [AC::class, 'update'])->name('update');
    //     Route::get('/editDeduct/{account}', [AC::class, 'editDeduct'])->name('editDeduct');
    //     Route::put('/editDeduct/{account}', [AC::class, 'updateDeduct'])->name('updateDeduct');
    //     Route::delete('/delete/{account}', [AC::class, 'destroy'])->name('delete');
        
    //     });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
