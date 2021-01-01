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
Route::get('/forgot-pass', 'IndexController@forgotPassword')->name("home.forgot.pass");
Route::get('/confirm-code', 'IndexController@confirmPassword')->name("home.confirm.code");
Route::post('/verify', 'IndexController@verifyCode')->name("home.verify.code");
Route::post('/user-login-store', 'IndexController@userLoginStore')->name("home.login.store");
Route::post('/forgot-pass-send', 'IndexController@forgotPasswordRequest')->name("home.forgot.pass.post");
Route::get('/register', 'IndexController@register')->name("home.register");
Route::post('/register-store', 'IndexController@registerStore')->name("home.register.store");
Route::get('/contact', 'IndexController@contact');
Route::get('/about', 'IndexController@about');

Route::post('/store-poll', 'PollController@pollStore')->name('poll.store');
Route::get('/create-poll', 'PollController@createPoll')->name("poll.create");
Route::get('/stripe/{pkg?}/{poll_id?}', 'StripePaymentController@stripe')->name("stripe.get");
Route::post('/stripe', 'StripePaymentController@stripePost')->name('stripe.post');

//admin panel route
Route::group(['middleware' => 'logged'], function () {
    Route::get('/default', 'MainController@default')->name("admin.default");
    Route::get('/add-package', 'PackageController@addPackage')->name("package.add");
    Route::post('/store-package', 'PackageController@store')->name("package.store");
    Route::get('/all-packages', 'PackageController@allPackages')->name("package.all");
    Route::post('/update/{id}', 'PackageController@update')->name('package.update');
    Route::get('/edit/{id}', 'PackageController@edit')->name('package.edit');
    Route::get('/delete/{id}', 'PackageController@delete')->name('package.delete');
    Route::get('/all-poll', 'MainController@viewPoll')->name("admin.polls");
    Route::get('/poll-change/{pollId}/{status}', 'MainController@changePoll');
    Route::get('/poll-details/{pollId}', 'MainController@detailsPoll');
    Route::post('/logout', 'MainController@logout')->name("admin.logout");
});

Route::get('/login', 'MainController@login')->name("admin.login");
Route::post('/login-store', 'MainController@loginStore')->name("admin.login.store");

// User panel route
Route::group(['middleware' => 'Uislogged'], function () {
    Route::get('/add-poll/{pkg}', 'PollController@addPoll')->name('poll.add');
    Route::post('/user-logout', 'IndexController@userLogout')->name("home.logout");
    Route::get('/view-poll', 'PollController@viewPoll')->name("user.polls");
    Route::get('/details/{id}', 'PollController@detailsPoll')->name("poll.details");
    Route::post('/vote', 'PollController@vote')->name("user.vote.post");
    Route::get('/poll', 'IndexController@allPoll')->name("user.vote");
    Route::get('/profile', 'IndexController@profile')->name("user.profile");
});




