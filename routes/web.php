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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => ['web']], function () {
    // Route::get('login', 'UserLoginController@getUserLogin');
    // Route::post('login', ['as'=>'user.auth','uses'=>'UserLoginController@userAuth']);
    Route::get('admin/', 'AdminLoginController@getAdminLogin');
    Route::get('admin/login', 'AdminLoginController@getAdminLogin');
    Route::post('admin/login', ['as'=>'admin.auth','uses'=>'AdminLoginController@adminAuth']);
    Route::group(['middleware' => ['admin']], function () {
        Route::get('admin/dashboard', ['as'=>'admin.dashboard','uses'=>'AdminController@dashboard']);
        Route::get('admin/settings', ['as'=>'settings','uses'=>'AdminController@settings']);
        Route::post('admin/settings', ['as'=>'settings','uses'=>'AdminController@settingsUpdate']);
        // Route::group(['prefix' => 'users'], function(){
            Route::get('admin/users', ['as'=>'users','uses'=>'UserController@index']);
            Route::get('admin/users/{userId}/view', ['as'=>'users','uses'=>'UserController@show_user']);
            Route::get('admin/users/{userId}/edit', ['as'=>'users','uses'=>'UserController@edit']);
            Route::post('admin/users/{userId}/edit', ['as'=>'users','uses'=>'UserController@update']);
            Route::get('admin/users/add', ['as'=>'users','uses'=>'UserController@create']);
            Route::post('admin/users/store', ['as'=>'users','uses'=>'UserController@store']);
        /*});
        Route::group(['prefix' => 'books'], function(){*/
            Route::get('admin/books', ['as'=>'books','uses'=>'BookController@index']);
            Route::get('admin/books/add', ['as'=>'books','uses'=>'BookController@create']);
            Route::post('admin/books/create', ['as'=>'books','uses'=>'BookController@store']);
            Route::get('admin/books/{bookId}/edit', ['as'=>'books','uses'=>'BookController@edit']);
            Route::post('admin/books/{bookId}/edit', ['as'=>'admbooks','uses'=>'BookController@update']);
            Route::get('admin/books/{bookId}/view', ['as'=>'books','uses'=>'BookController@show_book']);
            Route::delete('admin/books/{bookId}', ['as'=>'books','uses'=>'BookController@delete']);

            Route::get('admin/books/{bookId}/add-species', ['as'=>'books','uses'=>'SpeciesController@create']);
            Route::post('admin/books/{bookId}/store', ['as'=>'books','uses'=>'SpeciesController@store']);
            Route::get('admin/species/{speciesId}/view', ['as'=>'books','uses'=>'SpeciesController@show_species']);
            Route::get('admin/species/{speciesId}/edit', ['as'=>'books','uses'=>'SpeciesController@edit']);
            Route::post('admin/species/{speciesId}/edit', ['as'=>'books','uses'=>'SpeciesController@update']);
            Route::delete('admin/species/{speciesId}', ['as'=>'books','uses'=>'SpeciesController@delete']);

            Route::get('admin/species/{speciesId}/add-galleries', ['as'=>'books','uses'=>'GalleryController@create']);
            Route::post('admin/species/{speciesId}/add-galleries', ['as'=>'books','uses'=>'GalleryController@store']);
            Route::delete('admin/galleries/{galleryId}', ['as'=>'books','uses'=>'GalleryController@delete']);

            Route::get('admin/species/{speciesId}/add-voices', ['as'=>'books','uses'=>'VoiceController@create']);
            Route::post('admin/species/{speciesId}/add-voices', ['as'=>'books','uses'=>'VoiceController@store']);
            Route::delete('admin/voices/{voiceId}', ['as'=>'books','uses'=>'VoiceController@delete']);
        // });
        Route::get('admin/logout', 'AdminLoginController@logout');
    });
});
