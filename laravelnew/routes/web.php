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
    return view('firstpage');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::POST('/insert-post','PostController@store');
Route::get('/All-post','PostController@AllPost')->name('all.posts');

Route::get('delete-post/{id}','PostController@delete');
Route::get('edite-post/{id}','PostController@edite');
Route::post('update-post/{id}','PostController@update');


Route::get('/password-change','HomeController@password')->name('password.change');
Route::post('update-pass','HomeController@updatepass');


Route::get('/news-add','PostController@news')->name('news.add');


Route::post('/insert-news','PostController@insertnews');



Route::get('/All-news','PostController@allnews')->name('all.news');



Route::get('/delete-news/{id}','PostController@deleteNews');

Route::get('/view-post/{id}','NewsController@viewPost');



