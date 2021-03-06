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

Auth::routes();
Route::get('/linelogin', 'LineLoginController@lineLogin')->name('linelogin');
Route::get('/login/line/callback', 'LineLoginController@callback')->name('callback');
Route::get('/home', 'HomeController@index')->name('home');

//Route::get('login/{provider}',          'Auth\SocialAccountController@redirectToProvider');
//Route::get('login/{provider}/callback', 'Auth\SocialAccountController@handleProviderCallback');

Route::group(['middleware' => ['auth']], function() {
    // 「ログイン」かつ「admin_permissionを持つ」時のみアクセス可能
    Route::group(['middleware' => ['permission:admin_permission']], function () {
        //
    });
    // 「ログイン」かつ「manager_permissionを持つ」時のみアクセス可能
    Route::group(['middleware' => ['permission:manager_permission']], function () {
        Route::resource('managers', 'ManagerController');
    });
    // 「ログイン」かつ「player_permissionを持つ」時のみアクセス可能
    Route::group(['middleware' => ['permission:player_permission']], function () {
        Route::resource('users', 'UserController');
        Route::resource('schedules', 'ScheduleController');
        Route::resource('clubs', 'ClubController');
    });
    Route::resource('users', 'UserController');
    Route::resource('schedules', 'ScheduleController');
    Route::resource('clubs', 'ClubController');
});