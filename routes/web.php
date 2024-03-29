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

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BibitController;
use App\Http\Controllers\DefinisiController;

Route::redirect('/', '/home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/search', 'SearchController@search')->name('search');

Route::group(['prefix' => '/user', 'as' => 'user.', 'middleware' => ['can:administrate-users', 'auth']], function() {
    Route::get('/index', 'UserController@index')->name('index');
    Route::get('/create', 'UserController@create')->name('create');
    Route::post('/store', 'UserController@store')->name('store');
    Route::get('/edit/{user}', 'UserController@edit')->name('edit');
    Route::post('/update/{user}', 'UserController@update')->name('update');
    Route::post('/delete/{user}', 'UserController@delete')->name('delete');
});

Route::group(['prefix' => '/article', 'as' => 'article.', 'middleware' => ['can:administrate-articles', 'auth']], function() {
    Route::get('/index', 'ArticleController@index')->name('index');
    Route::get('/create', 'ArticleController@create')->name('create');
    Route::post('/store', 'ArticleController@store')->name('store');
    Route::get('/edit/{article}', 'ArticleController@edit')->name('edit');
    Route::post('/update/{article}', 'ArticleController@update')->name('update');
    Route::post('/delete/{article}', 'ArticleController@delete')->name('delete');
});

Route::group(['prefix' => '/article-verification', 'as' => 'article-verification.'], function() {
    Route::post('/create/{article}', 'ArticleVerificationController@create')->name('create');
    Route::post('/delete/{article}', 'ArticleVerificationController@delete')->name('delete');
});

Route::group(['prefix' => '/user-article', 'as' => 'user-article.'], function() {
    Route::middleware(['can:manage-articles', 'auth'])->group(function() {
        Route::get('/own-index', 'UserArticleController@ownIndex')->name('own-index');
        Route::get('/create', 'UserArticleController@create')->name('create');
        Route::post('/store', 'UserArticleController@store')->name('store');
        Route::get('/edit/{article}', 'UserArticleController@edit')->name('edit');
        Route::post('/update/{article}', 'UserArticleController@update')->name('update');
        Route::post('/delete/{article}', 'UserArticleController@delete')->name('delete')->middleware('can:delete-article,article');
    });

    Route::get('/index', 'UserArticleController@index')->name('index');
    Route::get('/filtered-index', 'UserArticleController@filteredIndex')->name('filtered-index');
    Route::get('/read/{article}', 'UserArticleController@read')->name('read')->middleware('can:read-article,article');
});

Route::group(['prefix' => '/category', 'as' => 'category.', 'middleware' => ['can:administrate-categories', 'auth']], function() {
    Route::get('/index', 'CategoryController@index')->name('index');
    // Route::get('/create', 'CategoryController@create')->name('create');
    Route::post('/store', 'CategoryController@store')->name('store');
    Route::get('/edit/{category}', 'CategoryController@edit')->name('edit');
    Route::post('/update/{category}', 'CategoryController@update')->name('update');
    Route::post('/delete/{category}', 'CategoryController@delete')->name('delete');
});

Route::group(['prefix' => '/mangrove', 'as' => 'mangrove.'], function() {
    Route::get('/index', 'MangroveController@index')->name('index');

    Route::middleware(['can:administrate-researches', 'auth'])->group(function() {
        Route::get('/edit', 'MangroveController@edit')->name('edit');
        Route::post('/update', 'MangroveController@update')->name('update');
    });
});

Route::group(['prefix' => '/information', 'as' => 'information.'], function() {
    Route::get('/index/{information}', 'InformationController@index')->name('index');
    Route::get('/edit/{information}', 'InformationController@edit')->name('edit');
    Route::post('/update/{information}', 'InformationController@update')->name('update');
});

Route::group(['prefix' => '/research', 'as' => 'research.'], function() {
    Route::middleware(['can:administrate-researches', 'auth'])->group(function() {
        Route::get('/index', 'ResearchController@index')->name('index');
        Route::get('/create', 'ResearchController@create')->name('create');
        Route::post('/store', 'ResearchController@store')->name('store');
        Route::get('/edit/{research}', 'ResearchController@edit')->name('edit');
        Route::get('/detail/{research}', 'ResearchController@detail')->name('detail');
        Route::post('/update/{research}', 'ResearchController@update')->name('update');
        Route::post('/delete/{research}', 'ResearchController@delete')->name('delete');
    });

    Route::get('/document/{research}', 'ResearchController@document')->name('document');
});

Route::group(['prefix' => '/research-verification', 'as' => 'research-verification.'], function() {
    Route::post('/create/{research}', 'ResearchVerificationController@create')->name('create');
    Route::post('/delete/{research}', 'ResearchVerificationController@delete')->name('delete');
});

Route::group(['prefix' => '/user-research', 'as' => 'user-research.'], function() {
    Route::middleware(['auth'])->group(function() {
        Route::get('/own-index', 'UserResearchController@ownIndex')->name('own-index');
        Route::get('/create', 'UserResearchController@create')->name('create');
        Route::post('/store', 'UserResearchController@store')->name('store');
        Route::get('/edit/{research}', 'UserResearchController@edit')->name('edit');
        Route::post('/update/{research}', 'UserResearchController@update')->name('update');
        Route::post('/delete/{research}', 'UserResearchController@delete')->name('delete');
    });

    Route::get('/detail/{research}', 'UserResearchController@detail')->name('detail');
    Route::get('/index', 'UserResearchController@index')->name('index');
});

Route::group(['prefix' => '/slide', 'as' => 'slide.'], function() {
    Route::middleware(['can:administrate-home', 'auth'])->group(function() {
        Route::get('/index', 'SlideController@index')->name('index');
        Route::get('/edit/{slide}', 'SlideController@edit')->name('edit');
        Route::post('/update/{slide}', 'SlideController@update')->name('update');
    });

    Route::get('/image/{slide}', 'SlideController@image')->name('image');
});

Route::group(['prefix' => '/program-pemerintah', 'as' => 'program-pemerintah.'], function() {
    Route::get('/index', 'ProgramPemerintahController@index')->name('index');
    Route::get('/image/{programPemerintah}', 'ProgramPemerintahController@image')->name('image');
    Route::get('/', 'ProgramPemerintahController@guestIndex')->name('guest.index');
    Route::get('/guest-detail/{programPemerintah}', 'ProgramPemerintahController@guestDetail')->name('guest.detail');
    Route::get('/show/{programPemerintah}', 'ProgramPemerintahController@show')->name('show');
    Route::get('/create', 'ProgramPemerintahController@create')->name('create');
    Route::post('/store', 'ProgramPemerintahController@store')->name('store');
    Route::get('/edit/{programPemerintah}', 'ProgramPemerintahController@edit')->name('edit');
    Route::post('/update/{programPemerintah}', 'ProgramPemerintahController@update')->name('update');
    Route::post('/delete/{programPemerintah}', 'ProgramPemerintahController@delete')->name('delete');
});

Route::group(['prefix' => '/pengalaman', 'as' => 'pengalaman.'], function() {
    Route::get('/', 'PengalamanController@guestIndex')->name('guest.index');
    Route::get('/guest-detail/{pengalaman}', 'PengalamanController@guestDetail')->name('guest.detail');
    Route::get('/detail/{pengalaman}', 'PengalamanController@detail')->name('detail');
    Route::get('/index', 'PengalamanController@index')->name('index');
    Route::get('/own-index', 'PengalamanController@ownIndex')->name('own-index');
    Route::get('/create', 'PengalamanController@create')->name('create');
    Route::post('/store', 'PengalamanController@store')->name('store');
    Route::get('/edit/{pengalaman}', 'PengalamanController@edit')->name('edit');
    Route::post('/update/{pengalaman}', 'PengalamanController@update')->name('update');
    Route::post('/delete/{pengalaman}', 'PengalamanController@delete')->name('delete');
});

Route::group(['prefix' => '/bibit', 'as' => 'bibit.'], function() {
    Route::get('/index', [BibitController::class, 'index'])->name('index');
    Route::get('/image/{bibit}', [BibitController::class, 'image'])->name('image');
    Route::get('/guest-index', [BibitController::class, 'guestIndex'])->name('guest.index');
    Route::get('/show/{bibit}', [BibitController::class, 'show'])->name('show');
    Route::get('/guest-show/{bibit}', [BibitController::class, 'guestShow'])->name('guest.show');
    Route::get('/create', [BibitController::class, 'create'])->name('create');
    Route::post('/store', [BibitController::class, 'store'])->name('store');
    Route::get('/edit/{bibit}', [BibitController::class, 'edit'])->name('edit');
    Route::post('/update/{bibit}', [BibitController::class, 'update'])->name('update');
    Route::post('/delete/{bibit}', [BibitController::class, 'delete'])->name('delete');
});

Route::group(['prefix' => '/definisi', 'as' => 'definisi.'], function() {
    Route::get('/index', [DefinisiController::class, 'index'])->name('index');
    Route::get('/image/{definisi}', [DefinisiController::class, 'image'])->name('image');
    Route::get('/show/{definisi}', [DefinisiController::class, 'show'])->name('show');
    Route::get('/create', [DefinisiController::class, 'create'])->name('create');
    Route::post('/store', [DefinisiController::class, 'store'])->name('store');
    Route::get('/edit/{definisi}', [DefinisiController::class, 'edit'])->name('edit');
    Route::post('/update/{definisi}', [DefinisiController::class, 'update'])->name('update');
    Route::post('/delete/{definisi}', [DefinisiController::class, 'delete'])->name('delete');
});
