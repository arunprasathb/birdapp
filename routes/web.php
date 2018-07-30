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
        Route::get('admin/users', ['as'=>'admin.users','uses'=>'AdminController@users']);
        Route::get('admin/users/{userId}/view', ['as'=>'admin.show_user','uses'=>'AdminController@show_user']);
        Route::get('admin/books', ['as'=>'admin.users','uses'=>'AdminController@books']);
        Route::get('admin/books/{bookId}/view', ['as'=>'admin.show_book','uses'=>'AdminController@show_book']);
        // Route::get('admin/species', ['as'=>'admin.users','uses'=>'AdminController@books']);
        Route::get('admin/species/{speciesId}/view', ['as'=>'admin.show_species','uses'=>'AdminController@show_species']);
        Route::get('/admin/logout', 'AdminLoginController@logout');
    });
});
