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
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/', function () {
    return view('auth.login');
})->middleware('auth');

Auth::routes();

Route::post('/addContext/', 'ContextController@create')->middleware('auth');
Route::get('/addContext/',  function () {
    return view('addContext');
})->middleware('auth');

Route::post('/addLanguage/', 'LanguageController@create')->middleware('auth');
Route::get('/addLanguage/',  function () {
    return view('addLanguage');
})->middleware('auth');

Route::post('/addSammlung/', 'SammlungController@create')->middleware('auth');
Route::get('/addSammlung/',  function () {
    return view('addSammlung');
})->middleware('auth');

Route::post('/addSnippet/', 'SnippetController@create')->middleware('auth');
Route::get('/addSnippet/',  function () {
    return view('addSnippet');
})->middleware('auth');
Route::get('/getAllSnippets/', 'SnippetController@getAllSnippets')->middleware('auth');

