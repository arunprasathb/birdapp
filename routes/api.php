<?php

// Route::group(['middleware' => 'apiKeyAuth'], function () {
    Route::post('/user/register', 'UserController@register');
    Route::post('/user/login', 'UserController@login');
    Route::post('user/forgetPassword', 'UserController@forgetPassword'); 
    Route::group(['middleware' => 'userAuth'], function () {
    	Route::post('/user/logout', 'UserController@logout');
        Route::post('/user/profileupdate/{id}', 'UserController@profileupdate');
        Route::post('/user/profileImageUpdate/{id}', 'UserController@profileImageUpdate');
        Route::post('/books', 'BookController@bookList');
        Route::post('/bookById', 'BookController@bookById');
        Route::post('/speciesById', 'SpeciesController@speciesById');
        Route::post('/books/payment', 'BookController@payment');
        Route::post('/species/commentImageUpload', 'SpeciesController@commentImageUpload');
        Route::post('/species/comments', 'SpeciesController@comments');
        Route::post('/books/getBookFullDetails', 'BookPaymentController@getBookFullDetails');
    });
    
// });
