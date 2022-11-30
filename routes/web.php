<?php

use App\Http\Controllers\GetApiController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/check-ongkir', [GetApiController::class, 'create'])->name('create.form');
Route::get('/get/api', [GetApiController::class, 'index']);
Route::get('/get/check-ongkir', [GetApiController::class, 'store'])->name('post.api');
Route::get('/getCity/ajax/{id}', [GetApiController::class, 'ajax']);
