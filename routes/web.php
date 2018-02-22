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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/loan', 'LoanController@index')->name('loan');
Route::get('/loan/create', 'LoanController@create')->name('loan.create');
Route::get('/loan/{id}', 'LoanController@detail')->where('id', '[0-9]+')->name('loan.detail');
Route::get('/loan/{id}/repay', 'LoanController@repay')->where('id', '[0-9]+')->name('loan.repay');
