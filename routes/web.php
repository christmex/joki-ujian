<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Supplier\SupplierController;

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

Route::get('/', [SiteController::class,'login']); //localhost:8000
Route::get('/register', [SiteController::class,'register']); //localhost:8000/register
Route::get('/logout', [SiteController::class,'doLogout']); //localhost:8000/logout

Route::post('/doLogin', [SiteController::class,'doLogin']); //localhost:8000/doLogin
Route::post('/doRegister', [SiteController::class,'doRegister']); //localhost:8000/doRegister


Route::group(['prefix' => 'admin'], function(){
    Route::get('/', [AdminController::class,'index']);
    Route::post('/simpanobat', [AdminController::class,'simpan']);
    Route::get('/hapusobat/{id}', [AdminController::class,'hapus']);
});

Route::group(['prefix' => 'supplier'], function(){
    Route::get('/', [SupplierController::class,'index']);
    Route::post('/cariobat', [SupplierController::class,'cariobat']);
});
