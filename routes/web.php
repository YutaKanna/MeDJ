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

Route::get('/', 'TopController@index')->name('top');

Route::group(['middleware' => ['auth']], function() {
    // Live
    Route::get('/input', 'LiveController@toInput')->name('live.to_input');
    Route::post('/input', 'LiveController@search')->name('live.search');
    Route::get('{videoId}/upload', 'LiveController@showUpload')->name('live.show.upload-screen');
    Route::post('{videoId}/upload', 'LiveController@upload')->name('live.upload');
    // Route::get('{live}/edit', 'LiveController@edit')->name('live.edit');
    // Route::put('{live}', 'LiveController@update')->name('live.update');
    // Route::delete('{live}', 'LiveController@destroy')->name('live.destroy');
});