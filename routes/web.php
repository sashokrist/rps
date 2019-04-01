<?php

Auth::routes();

Route::get('/welcome', 'HomeController@index');

Route::group(['middleware' => ['auth']], function (){

    Route::get('/', 'GameController@index');

    Route::resource('game', 'GameController');

    Route::get('/home', 'ProfileController@index');

});

/*Route::get('/', function () {
    $games = Game::all();
    return View::make('game')->with('games', $games);
});*/
/*Route::get('/profile/', function (){
    $username = auth()->user()->name;
    $user = User::where('name', $username)->firstOrFail();
   // dd($user);
    return View::make('profile')->with('user', $user);
});*/
