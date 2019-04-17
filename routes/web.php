<?php

Auth::routes();

Route::get('/welcome', 'HomeController@index');

Route::group(['middleware' => ['auth']], function (){

    Route::get('/', 'GameController@index');

    Route::resource('game', 'GameController');

    Route::get('/statistic', 'GameController@statistic');

    Route::get('/home', 'ProfileController@index');

    Route::get('/profile', 'ProfileController@profile');

    Route::post('/profile', 'ProfileController@update_avatar');


});
Route::get('gameover', 'GameController@gameover');

