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
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::prefix('forum')->group(function() {

    //All Threads
    Route::get('', 'Forum\ThreadController@index')->name('threads.index');

    //Create
    Route::get('create', 'Forum\ThreadController@create')->name('threads.create');
    Route::post('create', 'Forum\ThreadController@store');

    //My Threads
    Route::get('mine', 'Forum\ThreadController@mine')->name('threads.me');

    Route::get('{slug}', 'Forum\ThreadController@show')->name('threads.show');

    Route::get('{thread}/edit', 'Forum\ThreadController@edit')->name('threads.edit');
    Route::post('{thread}/edit', 'Forum\ThreadController@update');

    Route::post('{thread}/delete', 'Forum\ThreadController@destroy')->name('threads.delete');

    Route::prefix('replies')->group(function() {
        Route::post('{thread}/create', 'Forum\ReplyController@store')->name('replies.create');

        Route::get('{reply}/edit', 'Forum\ReplyController@edit')->name('replies.edit');
        Route::post('{reply}/edit', 'Forum\ReplyController@update');
    });
});
