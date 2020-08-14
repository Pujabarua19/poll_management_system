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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware'=> 'logged'],function(){
// Route::get('default', 'mainController@default');
Route::get('default', 'mainController@default');
Route::get('addPackage', 'packageController@addPackage');
Route::post('store', 'packageController@store');
Route::get('allPackages', 'packageController@allPackages');
Route::post('update/{id}','packageController@update')->name('update');
Route::get('edit/{id}', 'packageController@edit')->name('edit');
Route::get('delete/{id}','packageController@delete')->name('delete');
});


Route::get('login', 'mainController@login');
Route::get('loginstore', 'mainController@loginstore');










// Route::group(['middleware'=> 'Ulogged'],function(){
// User panel route
Route::get('addpoll', 'pollController@addpoll');


Route::get('index', 'indexController@index');
Route::get('userlogin', 'indexController@userlogin');
Route::get('userloginstore', 'indexController@userloginstore');
Route::get('register', 'indexController@register');
Route::post('registerStore', 'indexController@registerStore');

// });