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

Route::group(array('prefix' => '/'), function () {

    Route::get('', [
        'uses' => 'App\\Http\\Controllers\\Lk\\EmployeesController@index',
    ]);

});

Route::group(array('prefix' => 'employees'), function () {

    Route::put('store', [
        'uses' => 'App\\Http\\Controllers\\Lk\\EmployeesController@store',
    ]);

});
