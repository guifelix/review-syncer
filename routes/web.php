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

    Route::resource('/', 'HomeController');

    Route::group(['prefix' => 'Reviews', 'namespace' => 'Reviews'], function(){
        Route::get('/','ReviewsController@index')->name('reviews.index');
        Route::get('jsonReviews','ReviewsController@jsonReviews')->name('jsonReviews');

    });
