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
    Route::get('/', 'HomeController@index')->name('home.index');
    Auth::routes();

    Route::group(['prefix' => 'Reviews', 'namespace' => 'Reviews'], function(){
        Route::get('/','ReviewsController@index')->name('reviews.index');
        Route::match(['get','post'],'jsonReviews/{product?}','ReviewsController@jsonReviews')->name('jsonReviews');
        Route::match(['get','post'],'refresh','ReviewsController@refreshReviews')->name('jsonRefresh');

        /**
         * Next step, create button to refresh
         */
        // Route::get('/refresh', function () {
        //     $refresh = Artisan::call('fetch:reviews');
        // });

    });
