<?php

// Route::group(['middleware' => 'apiKeyAuth'], function () {
    Route::post('/user/register', 'UserController@register');
    Route::post('/user/login', 'UserController@login');
    Route::post('user/forgetPassword', 'UserController@forgetPassword'); 
    Route::group(['middleware' => 'userAuth'], function () {
    	Route::post('/user/logout', 'UserController@logout');
        Route::post('/user/profileupdate/{id}', 'UserController@profileupdate');
         Route::get('/books', 'BookController@index');
        Route::post('/bookById/{bookId}', 'BookController@bookById');
        Route::post('/speciesById/{speciesId}', 'SpeciesController@speciesById');
    });
    
// });
