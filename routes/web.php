<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactController;
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
    return view('contactform');
});

Route::post("/add",[ContactController::class,"add"]);
Route::post("/store",[ContactController::class,"store"]);
Route::get("/admin",[ContactController::class,"index"]);
Route::get("/search",[ContactController::class,"search"]);
Route::post("/delete",[ContactController::class,"delete"]);
Route::get("/reset",[ContactController::class,"reset"]);
