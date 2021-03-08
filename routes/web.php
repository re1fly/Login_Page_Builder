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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    return redirect()->route('omada.login.show', 'testinafasdfasd')
        ->withErrors('testing', 'test');
});

Route::get('testing', 'Controller@testing');

Route::prefix('page')
    ->group(function () {

        Route::get('{serviceLocationUUID}', 'LoginPageController@get')->name('page.get');
        Route::post('{serviceLocationUUID}', 'LoginPageController@savePage')->name('page.save');
        Route::post('{serviceLocationUUID}/form/{loginPageId}', 'LoginPageController@saveForm')->name('page.save.form');

    });

Route::prefix('omada')
    ->group(function () {

        Route::get('{serviceLocationUUID}/login', 'OmadaController@show')->name('omada.login.show');
        Route::post('{serviceLocationUUID}/login', 'OmadaController@login')->name('omada.login.auth');
        Route::get('{serviceLocationUUID}/login/success', 'OmadaController@success')->name('omada.login.success');

    });

Route::prefix('auth')
    ->group(function () {

        Route::get('google', 'SocialiteLoginController@redirectToGoogle')->name('google.login');
        Route::get('google/callback', 'SocialiteLoginController@handleGoogleCallback')->name('google.callback');

        Route::get('facebook', 'SocialiteLoginController@redirectToFacebook')->name('facebook.login');
        Route::get('facebook/callback', 'SocialiteLoginController@handleFacebookCallback')->name('facebook.callback');

        Route::get('twitter', 'SocialiteLoginController@redirectToTwitter')->name('twitter.login');
        Route::get('twitter/callback', 'SocialiteLoginController@handleTwitterCallback')->name('twitter.callback');

        Route::get('github', 'SocialiteLoginController@redirectToGithub')->name('github.login');
        Route::get('github/callback', 'SocialiteLoginController@handleGithubCallback')->name('github.callback');

    });
