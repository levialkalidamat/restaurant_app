<?php

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

Route::get("/", function(){
    return view("pages.home");
})->name('base_home');


Route::get("/menu", function(){
    return view("pages.menu");
})->name('base_menu');

//Gestion 
Route::ressource('categories', 'CategoryController')->name('base_categories');
Route::ressource('plats', 'PlatController')->name('base_plats');
Route::ressource('delivery', 'DeliveryController')->name('base_deliveries');
Route::ressource('tables', 'TablesController')->name('base_tables');

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