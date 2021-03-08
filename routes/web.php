<?php

use App\Http\Controllers\Converter;
use App\Http\Controllers\Form;
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

Route::get('/design', function () {
    return view('design');
});

Route::get('/datahtml',[Converter::class, 'convertHtml']);

Route::post('/login',[Form::class, 'login']);

//Route::get('/datahtml', function () {
//    return view('data_html');
//});

//Route::view('editor', 'app');

Route::get('testing', 'Controller@testing');

Route::get('html', 'Controller@getHtml');
Route::post('html', 'Controller@saveHtml');

Route::get('json', 'Controller@getJson');
Route::post('json', 'Controller@saveJson');

Route::get('form', 'Controller@getForm');
Route::post('form', 'Controller@saveForm');

Route::get('/', function () {
    return view('app');
});
