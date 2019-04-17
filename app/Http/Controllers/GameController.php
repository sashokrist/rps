<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\Profile;
use App\User;
use Illuminate\Support\Facades\Session;

class GameController extends Controller
{
    public function index(){

        $newGame = new Game;
        $newGame->user_id = auth()->user()->id;
        $newGame->avatar = auth()->user()->avatar;
        $newGame->name = auth()->user()->name;
        $newGame->save();
        Session::put('newGame', $newGame);
        $games = Game::orderBy('id', 'desc')->paginate(10);

        return view('game')->with('games', $games);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        if ($request->isXmlHttpRequest()) {
            $items = $request->get('name');
        }
        $game = Session::get('newGame');

        $options = array("rock", "paper", "scissors");
        $computer = $options[rand(0, 2)];

            if ($items == 'scissors' && $computer == 'paper' ||
                $items == 'paper' && $computer == 'rock' ||
                $items == 'rock' && $computer == 'scissors') :
                $itemsR = 'Win';

                $profile = new Profile();
                $profile->user_id = auth()->user()->id;
                $profile->name = auth()->user()->name;

                $username = auth()->user()->id;
                $user = User::where('id', $username)->firstOrFail();
                foreach ($user->games as $game){
                    $gameId = $game->id;
                }

                $profile->game_id = $gameId;
                $profile->user_choice = $items;
                $profile->computer = $computer;
                $profile->result = 'Win';
                $profile->count = 1;
                $profile->save();
            endif;

            if ($computer == 'scissors' && $items == 'paper' ||
                $computer == 'paper' && $items == 'rock' ||
                $computer == 'rock' && $items == 'scissors') :
                $itemsR = 'Lost';
                $profile = new Profile();
                $profile->user_id = auth()->user()->id;
                $profile->name = auth()->user()->name;

                $username = auth()->user()->id;
                $user = User::where('id', $username)->firstOrFail();
                foreach ($user->games as $game){
                    $gameId = $game->id;
                }
                $profile->game_id = $gameId;
                $profile->user_choice = $items;
                $profile->computer = $computer;
                $profile->result = 'Lost';
                $profile->save();
            endif;

            if ($items == $computer) :
                $itemsR = 'Tie';
                $profile = new Profile();
                $profile->user_id = auth()->user()->id;
                $profile->name = auth()->user()->name;

                $username = auth()->user()->id;
                $user = User::where('id', $username)->firstOrFail();
                foreach ($user->games as $game){
                    $gameId = $game->id;
                }
                $profile->game_id = $gameId;
                $profile->user_choice = $items;
                $profile->computer = $computer;
                $profile->result = 'Tie';
                $profile->save();
            endif;

        $roundWins = $game->rounds->where('count', 1);

      if ($game->rounds->count() <= 2) {
                return response()->json([
                    'result' => $itemsR
                ]);
            } elseif($roundWins->count() == 2) {
                $game->result = 'WIN';
                $game->save();
                return response()->json([
                    'gameover' => 'game over'
                ]);
            } else{
                  $game->result = 'LOST';
                  $game->save();
                  return response()->json([
                      'gameover' => 'GAME OVER',
                      'success'=> 'GAME OVER'
                  ]);
      }

    }

    public function statistic(){

        $avatars = User::all();
        $games = Game::orderBy('created_at', 'desc')->paginate(10);
        return view('statistic', compact('games'))->with('avatars', $avatars);
    }

    public function gameover(){

        $user = auth()->user();

        $games = $user->games->last();
        //dd($games);
        return view('gameover', compact('games'));
    }



    public function show($id)
    {
        /* $game = Player::find($id);
         return view('play')->with('player', $game);*/
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

}
