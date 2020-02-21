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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('welcome');
});

Route::post('/addContext/', 'ContextController@create');
Route::get('/addContext/',  function () {
    return view('addContext');
});

Route::post('/addLanguage/', 'LanguageController@create');
Route::get('/addLanguage/',  function () {
    return view('addLanguage');
});

Route::post('/addSammlung/', 'SammlungController@create');
Route::get('/addSammlung/',  function () {
    return view('addSammlung');
});
