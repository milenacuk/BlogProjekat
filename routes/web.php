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
Route::get('/posts','PostsController@index');

Route::get('/logout','LoginController@logout');

Route::prefix('login')->group(function(){
Route::get('/','LoginController@index')->name('login');
Route::post('/','LoginController@login');
});

Route::prefix('register')->group(function(){
    Route::get('/', 'RegisterController@create');
    Route::post('/', 'RegisterController@store');
});

Route::group( ['prefix'=> 'posts','middleware' => ['auth']], function(){
    Route::get('/create', 'PostsController@create');
    Route::post('/', 'PostsController@store');
    Route::get('/{id}','PostsController@show');
    //Route::get('/','PostsController@index');  //izvadili smo ovu rutu jer treba svi da vide index stranu,zbog testiranja
    
    Route::prefix('/{postId}/comments')->group(function(){
        Route::post('/', 'CommentsController@store');
        Route::post('/{commentId}', 'CommentsController@destroy');
    });   
});

Route::get('/users/{id}','UsersController@show');

Route::get('posts/tags/{tag}','TagsController@index');



