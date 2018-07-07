<?php

// Route::group(['middleware' => 'apiKeyAuth'], function () {
    Route::post('/user/register', 'UserController@register');
    Route::post('/user/login', 'UserController@login');
    Route::group(['middleware' => 'userAuth'], function () {
    	Route::post('/user/logout', 'UserController@logout');
         Route::get('/books', 'BookController@index');
        Route::post('/bookById/{bookId}', 'BookController@bookById');
        Route::post('/speciesById/{speciesId}', 'SpeciesController@speciesById');
        // Route::put('/product/update', 'ProductController@update');
        // Route::delete('/product/delete', 'ProductController@delete');
    });
    
// });
