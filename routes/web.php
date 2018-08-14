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

Route::group(array('middleware' => 'auth'), function(){

    Route::get('/', [
        'as'   => 'dashboard',
        'uses' => 'Site\DashboardController@index',
    ]);

    Route::get('/logout',[
        'as'   => 'logout',
        'uses' => 'Auth\LoginController@logout',
    ]);
});



Route::group(array('prefix' => 'login'), function(){

    Route::get('/',[
        'as'   => 'login',
        'uses' => 'Auth\LoginController@index'
    ]);

    Route::post('/',[
        'as'   => 'login-post',
        'uses' => 'Auth\LoginController@auth'
    ]);

});