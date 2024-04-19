<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\Fitur1Controller;
use App\Http\Controllers\Fitur2Controller;
use App\Http\Controllers\Fitur3Controller;
use App\Http\Controllers\Fitur4Controller;
use App\Http\Controllers\Fitur5Controller;
use App\Http\Controllers\Fitur6Controller;
use App\Http\Controllers\KategoriController;

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

//kategori
Route::group([
    'namespace' => 'App',
    'middleware'    => ['auth']
], function(){
    Route::prefix('kategori')->group(function(){
       Route::get('/', [KategoriController::class, 'index']);
       Route::get('/tambah', [KategoriController::class, 'tambah']);
       Route::post('/tambah', [KategoriController::class, 'store']);
       Route::get('/{id}/edit', [KategoriController::class, 'edit']);
       Route::post('/{id}/edit', [KategoriController::class, 'update']);
       Route::get('/{id}/delete', [KategoriController::class, 'delete']);
    });

    Route::prefix('item')->group(function(){
        Route::get('/', [ItemController::class, 'index']);
        Route::get('/tambah', [ItemController::class, 'tambah']);
        Route::post('/tambah', [ItemController::class, 'store']);
        Route::get('/{id}/edit', [ItemController::class, 'edit']);
        Route::post('/{id}/update', [ItemController::class, 'update']);
       Route::get('/{id}/delete', [ItemController::class, 'delete']);
    });

    Route::prefix('home')->group(function(){
        Route::get('/', [HomeController::class, 'index']);
        Route::get('/{id}', [HomeController::class, 'category']);
        Route::post('/getproduct', [HomeController::class, 'getproduct']);
    });
    Route::get('/logout', [AuthController::class, 'logout']);
});





Route::group([
    'namespace' => 'App',
    'middleware'    => ['guest']
], function(){
    Route::get('/', [AuthController::class, 'index'])->name('login');
    Route::post('/', [AuthController::class, 'auth']);
});



