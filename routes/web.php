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

Auth::routes();

/* 首页 */
Route::get('/', [
    'middleware' => ['auth'],
    'uses'       => function () {
        if (Auth::user()) {
            return redirect('/loan');
        }
    },
]);

/* 后台管理 */
Route::group(['prefix' => '/loan', 'middleware' => ['auth']], function () {
    Route::get('/', 'LoanController@index')->name('loan');
    Route::match(['get', 'post'], '/create', 'LoanController@create')->name('loan.create');
    Route::get('/{id}', 'LoanController@detail')->where('id', '[0-9]+')->name('loan.detail');
    Route::delete('/{id}/delete', 'LoanController@delete')->where('id', '[0-9]+')->name('loan.delete');
    Route::delete('/{id}/repay/{interest}/delete', 'LoanController@deleteInterest')->where('id', '[0-9]+')->where('interest', '[0-9]+')->name('loan.interest.delete');
    Route::match(['get', 'post'], '/{id}/repay', 'LoanController@repay')->where('id', '[0-9]+')->name('loan.repay');
    Route::get('/{id}/interests', 'LoanController@interests')->where('id', '[0-9]+')->name('loan.interest');
});
