<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*~ Root ~*/
Route::get('/', 'API\MovieController@index')->name('root');

/*~ Movie ~*/
Route::get('/movies', 'API\MovieController@index')->name('movies');

/*~ Review ~*/
Route::get('/movies/{movie}/reviews', 'API\MovieReviewController@index')->name('movies.reviews.index');
Route::post('/movies/reviews/store', 'API\MovieReviewController@store')->name('movies.reviews.store');
