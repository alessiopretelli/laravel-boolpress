<?php

use Illuminate\Support\Facades\Route;
// toglie errore->
use Illuminate\Support\Facades\Auth;

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

Route::get('/', 'HomeController@index');
// Route::get('/articles', 'ArticleController@index')->name('articles.index');

Route::get('/contacts', function() {
    return view('contacts');
});

Route::resource('articles', 'ArticleController');

Route::get('/categories', 'CategoryController@index');
Route::get('/categories/{name}', 'CategoryController@show_articles')->name('category_selected');

// per rimuovere il register, inserire register in routes con false es.-> Auth::routes(['register' => false]);

Auth::routes();

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('auth')
    ->group(function () {
        Route::get('/', 'HomeController@index')->name('admin-homepage');
});

// Route::get('/admin', 'HomeController@index')->name('admin-homepage')->middleware('auth');
