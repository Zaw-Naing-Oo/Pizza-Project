<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PizzaController;
use \App\Http\Controllers\UserOrderController;
use \App\Http\Controllers\FrontendController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [FrontendController::class, 'index'])->name('frontpage');
Route::get('/pizza/{id}/detail', [FrontendController::class, 'show'])->name('frontpage.show');
Route::get('/pizza/{id}/store', [FrontendController::class, 'store'])->name('frontpage.store');




Route::group(['middleware' => ['auth','admin']],function (){
    Route::resource('/pizza',PizzaController::class);

    // User Order
    Route::resource('/order',UserOrderController::class);
    Route::post('/order/{id}/status',[UserOrderController::class,'changeStatus'])->name('order.status');

    //display all customers
    Route::get('/customers',[UserOrderController::class,'customer'])->name('customer');

});

