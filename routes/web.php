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

// ..... JobSeekersController

Route::get('createjobseeker', 'JobSeekerForm@create');
Route::post('insertjobseeker', 'JobSeekerForm@storejobseeker');

Auth::routes();

// ..... RegisterController
Route::post('register', 'Auth\RegisterController@register');

Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');

// ..... HomeController
Route::get('/home', 'HomeController@index')->name('home');

Route::get('search', 'HomeController@searchjobseekers');

Route::get('profileview/{id}', 'HomeController@profileview');

Route::get('/download/{file}', 'HomeController@download');

// ...... Refresh Captcha
Route::get('refreshcaptcha', 'JobSeekerForm@refreshCaptcha');