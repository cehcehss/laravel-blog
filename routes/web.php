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

Route::get('/','PostController@index');
Route::get('/posts/{postId}','PostController@show');
Route::get('/posts/tags/{tag}','TagController@index');
Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

// 後台
Route::prefix('admin/post')->middleware('auth')->group(function (){
    Route::get('/', 'Admin\PostController@index')->name('admin.posts');
    Route::get('/create', 'Admin\PostController@create')->name('admin.post.create');
    Route::post('/', 'Admin\PostController@store');
    Route::delete('/{post}', 'Admin\PostController@delete')->name('admin.post.delete');
    Route::get('/edit/{id}','Admin\PostController@edit')->name('admin.post.edit');
    Route::post('/update/{id}','Admin\PostController@update')->name('admin.post.update');
});