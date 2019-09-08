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

Route::group(['prefix' => '/'], function () {
    Route::resource('users', 'API\UserController');
    Route::resource('movies', 'API\MoviesController');
    Route::resource('genres', 'API\GenreController');
    Route::resource('photos', 'API\PhotoController');
    Route::resource('videos', 'API\VideoeController');
    Route::resource('ratings', 'API\RatingsController');
    Route::resource('reviews', 'API\ReviewsController');
    Route::resource('roles', 'API\RolesController');
    Route::resource('UserMovieRoles', 'API\UserMovieRoleController');//dont use till its migrated
});
