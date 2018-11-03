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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::redirect('/', '/home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => '/user', 'as' => 'user.'], function() {
    Route::get('/index', 'UserController@index')->name('index');
    Route::view('/create', 'user.create')->name('create');
    Route::post('/store', 'UserController@store')->name('store');
    Route::get('/edit/{user}', 'UserController@edit')->name('edit');
    Route::post('/update/{user}', 'UserController@update')->name('update');
    Route::post('/delete/{user}', 'UserController@delete')->name('delete');
});

Route::group(['prefix' => '/article', 'as' => 'article.'], function() {
    Route::get('/index', 'ArticleController@index')->name('index');
    Route::get('/create', 'ArticleController@create')->name('create');
    Route::post('/store', 'ArticleController@store')->name('store');
    Route::get('/edit/{article}', 'ArticleController@edit')->name('edit');
    Route::post('/update/{article}', 'ArticleController@update')->name('update');
    Route::post('/delete/{article}', 'ArticleController@delete')->name('delete');
});

Route::group(['prefix' => '/category', 'as' => 'category.'], function() {
    Route::get('/index', 'CategoryController@index')->name('index');
    Route::get('/create', 'CategoryController@create')->name('create');
    Route::post('/store', 'CategoryController@store')->name('store');
    Route::get('/edit/{category}', 'CategoryController@edit')->name('edit');
    Route::post('/update/{category}', 'CategoryController@update')->name('update');
    Route::post('/delete/{category}', 'CategoryController@delete')->name('delete');
});

Route::group(['prefix' => '/research', 'as' => 'research.'], function() {
    Route::get('/index', 'ResearchController@index')->name('index');
    Route::get('/create', 'ResearchController@create')->name('create');
    Route::post('/store', 'ResearchController@store')->name('store');
    Route::get('/edit/{research}', 'ResearchController@edit')->name('edit');
    Route::post('/update/{research}', 'ResearchController@update')->name('update');
    Route::post('/delete/{research}', 'ResearchController@delete')->name('delete');
    Route::get('/document/{research}', 'ResearchController@document')->name('document');
});

Route::group(['prefix' => '/slide', 'as' => 'slide.'], function() {
    Route::get('/index', 'SlideController@index')->name('index');
    Route::get('/image/{slide}', 'SlideController@image')->name('image');
    Route::get('/edit/{slide}', 'SlideController@edit')->name('edit');
    Route::post('/update/{slide}', 'SlideController@update')->name('update');
});