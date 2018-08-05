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
    Route::get('login', 'UserLoginController@getUserLogin');
    Route::post('login', ['as'=>'user.auth','uses'=>'UserLoginController@userAuth']);
    Route::get('admin/', 'AdminLoginController@getAdminLogin');
    Route::get('admin/login', 'AdminLoginController@getAdminLogin');
    Route::post('admin/login', ['as'=>'admin.auth','uses'=>'AdminLoginController@adminAuth']);
    Route::group(['middleware' => ['admin']], function () {
        Route::get('admin/dashboard', ['as'=>'admin.dashboard','uses'=>'AdminController@dashboard']);
        
        Route::get('admin/users', ['as'=>'admin.users','uses'=>'UserController@index']);
        Route::get('admin/users/{userId}/view', ['as'=>'admin.show_user','uses'=>'UserController@show_user']);
        
        Route::get('admin/books', ['as'=>'admin.books','uses'=>'BookController@index']);
        Route::get('admin/books/add', ['as'=>'admin.books','uses'=>'BookController@create']);
        Route::post('admin/books/create', ['as'=>'admin.books','uses'=>'BookController@store']);
        Route::get('admin/books/{bookId}/edit', ['as'=>'admin.edit_book','uses'=>'BookController@edit']);
        Route::post('admin/books/{bookId}/edit', ['as'=>'admin.update_book','uses'=>'BookController@update']);
        Route::get('admin/books/{bookId}/view', ['as'=>'admin.show_book','uses'=>'BookController@show_book']);
        Route::delete('admin/books/{bookId}', ['as'=>'admin.delete_book','uses'=>'BookController@delete']);

        Route::get('admin/books/{bookId}/add-species', ['as'=>'admin.add-species','uses'=>'SpeciesController@create']);
        Route::post('admin/books/{bookId}/store', ['as'=>'admin.store-species','uses'=>'SpeciesController@store']);
        Route::get('admin/species/{speciesId}/view', ['as'=>'admin.show_species','uses'=>'SpeciesController@show_species']);
        Route::get('admin/species/{speciesId}/edit', ['as'=>'admin.edit_species','uses'=>'SpeciesController@edit']);
        Route::post('admin/species/{speciesId}/edit', ['as'=>'admin.update_species','uses'=>'SpeciesController@update']);
        Route::delete('admin/species/{speciesId}', ['as'=>'admin.update_species','uses'=>'SpeciesController@delete']);

        Route::get('admin/species/{speciesId}/add-galleries', ['as'=>'admin.add-galleries','uses'=>'GalleryController@create']);
        Route::post('admin/species/{speciesId}/add-galleries', ['as'=>'admin.store-galleries','uses'=>'GalleryController@store']);
        Route::delete('admin/galleries/{galleryId}', ['as'=>'admin.delete_gallery','uses'=>'GalleryController@delete']);

        Route::get('admin/species/{speciesId}/add-voices', ['as'=>'admin.add-voices','uses'=>'VoiceController@create']);
        Route::post('admin/species/{speciesId}/add-voices', ['as'=>'admin.store-voices','uses'=>'VoiceController@store']);
        Route::delete('admin/voices/{voiceId}', ['as'=>'admin.delete_voice','uses'=>'VoiceController@delete']);

        Route::get('admin/logout', 'AdminLoginController@logout');
    });
});
