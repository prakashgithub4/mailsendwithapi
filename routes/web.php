<?php

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
Route::get('contact/',function(){
	return view('contact');
});
Route::get('pay/','PaypleController@index');

Route::get('payment', 'PaypleController@payment')->name('payment');
Route::get('cancel', 'PaypleController@cancel')->name('payment.cancel');
Route::get('payment/success', 'PaypleController@success')->name('payment.success');