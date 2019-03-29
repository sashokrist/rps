<?php
use App\User;
/*Route::get('/', function () {
    $games = Game::all();
    return View::make('game')->with('games', $games);
});*/
Route::get('/', 'GameController@index');

Route::resource('game', 'GameController');

Route::get('/profile/{username}', function ($username){
    $user = User::where('name', $username)->firstOrFail();
   // dd($user);
    return View::make('profile')->with('user', $user);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function (){

   // Route::get('profile', 'ProfileController@index');

});
