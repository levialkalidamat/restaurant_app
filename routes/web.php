<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlatController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DeliveryController;

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

/*Route::get("/", function(){
    return view("pages.home");
})->name('base_home');*/

Route::get('/', [HomeController::class, 'index'])->name('base_home');


Route::get("/menu", function(){
    return view("pages.menu");
})->name('base_menu');

//Gestion 
Route::resource('/categories', CategoryController::class);
Route::resource('/plats', PlatController::class);
Route::resource('/delivery', DeliveryController::class);
Route::resource('/tables', TableController::class);

/*Route::get('/', function () {
    return view('welcome');
});*/

/*Route::get('/test', function(){
    return view('layouts.base');
});*/


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';