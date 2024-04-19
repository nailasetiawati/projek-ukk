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

//Auth
Route::get('/login', [AuthController::class, 'index']);


Route::get('/register', [AuthController::class, 'register']);

Route::get('/register', function () {
    return view('contents.auth.register');
});

//Home
Route::get('/home', [HomeController::class, 'index']);

//Fitur1
Route::get('/fitur1', [Fitur1Controller::class, 'index']);

//Fitur2
Route::get('/fitur2', [Fitur2Controller::class, 'index']);

//Fitur3
Route::get('/fitur3', [Fitur3Controller::class, 'index']);

//Fitur4
Route::get('/fitur4', [Fitur4Controller::class, 'index']);

//Fitur5
Route::get('/fitur5', [Fitur5Controller::class, 'index']);

//Fitur6
Route::get('/fitur6', [Fitur6Controller::class, 'index']);

Route::get('/kategori', function () {
    return view('contents.kategori.index');
});

Route::get('/transaksi', function () {
    return view('contents.transaksi.index');
});

//kategori
Route::group([
    'namespace' => 'App',
    'middleware'    => ['guest']
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
        Route::get('/edit', [ItemController::class, 'edit']);
        Route::post('/edit', [ItemController::class, 'update']);
    });
});

//item






