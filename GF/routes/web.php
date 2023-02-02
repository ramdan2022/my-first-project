<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Clint;

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

Route::get('/',function(){
    return view('Welcome');
})->name('HOME');

route::resource('clints',Clint::class) ;

route::controller(Clint::class)->prefix('clints')->name('clints.')->group(function(){
        route::get('/clints/{country}','country')->name('country');
        route::get('{id}/orders','orders')->name('orders');
        route::get('{id}/orders/{order}','order')->name('order');
        route::get('/deleted','deleted')->name('deleted');
        route::get('/restore/{id}','restore')->name('restore');
        route::get('/limit/{limit}','limit')->name('limit');
        route::get('search','search')->name('search');
});



// route::get('/clints/{country}',[clint::class,'country'])->name('clints.country');


