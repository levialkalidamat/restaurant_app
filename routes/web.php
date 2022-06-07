<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
Route::resource('categories', 'CategoryController');
Route::resource('plats', 'PlatController');
Route::resource('delivery', 'DeliveryController');
Route::resource('tables', 'TablesController');

/*Route::get('/', function () {
    return view('welcome');
});*/
s
/*Route::get('/test', function(){
    return view('layouts.base');
});*/


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';