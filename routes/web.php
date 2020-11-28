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
Route::get('/', 'IndexController@index')->name("home.index");
Route::get('/user-login', 'IndexController@userLogin')->name("home.login");
Route::post('/user-login-store', 'IndexController@userLoginStore')->name("home.login.store");
Route::get('/register', 'IndexController@register')->name("home.register");
Route::post('/register-store', 'IndexController@registerStore')->name("home.register.store");
Route::get('/contact', 'IndexController@contact');
Route::get('/about', 'IndexController@about');


Route::post('/store-poll', 'PollController@pollStore')->name('poll.store');
Route::get('/create-poll', 'PollController@createPoll')->name("poll.create");
Route::get('/stripe/{pkg?}/{poll_id?}', 'StripePaymentController@stripe')->name("stripe.get");
Route::post('/stripe', 'StripePaymentController@stripePost')->name('stripe.post');

// admin panel route
Route::group(['middleware' => 'logged'], function () {
// Route::get('default', 'mainController@default');
    Route::get('/default', 'MainController@default')->name("admin.default");
    Route::get('/add-package', 'PackageController@addPackage')->name("package.add");
    Route::post('/store-package', 'PackageController@store')->name("package.store");
    Route::get('/all-packages', 'PackageController@allPackages')->name("package.all");
    Route::post('/update/{id}', 'PackageController@update')->name('package.update');
    Route::get('/edit/{id}', 'PackageController@edit')->name('package.edit');
    Route::get('/delete/{id}', 'PackageController@delete')->name('package.delete');
    Route::get('/all-poll', 'MainController@viewPoll');
    Route::get('/poll-approved/{pollId}', 'MainController@approvedPoll');
});


Route::get('/login', 'MainController@login')->name("admin.login");
Route::post('/login-store', 'MainController@loginStore')->name("admin.login.store");


// User panel route
Route::group(['middleware' => 'Uislogged'], function () {
    Route::get('/add-poll/{pkg}', 'PollController@addPoll')->name('poll.add');
    Route::post('/user-logout', 'IndexController@userLogout')->name("home.logout");
    Route::get('/view-poll', 'PollController@viewPoll');
});




