<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\Profile;
use App\User;

class GameController extends Controller
{
    public function index(){
        $games = Game::all();
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
        //dd($items);
        $options = array("rock", "paper", "scissors");
        $computer = $options[rand(0, 2)];
        $game = new Game();
        $game->user_id = auth()->user()->id;
        $game->name = auth()->user()->name;
       // $game->name = auth()->user()->name;
        //$game->computer = $computer;
        //$game->item = $items;

        if ($items == 'scissors' && $computer == 'paper' ||
            $items == 'paper' && $computer == 'rock' ||
            $items == 'rock' && $computer == 'scissors') :
            $game->result = 'Win';
            $game->count = 1;
            $game->save();
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
            $profile->save();
        endif;

        if ($computer == 'scissors' && $items == 'paper' ||
            $computer == 'paper' && $items == 'rock' ||
            $computer == 'rock' && $items == 'scissors') :
            $game->result = 'Lost';
            $game->count = 1;
            $game->save();
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
           $game->result = 'Tie';
            $game->count = 1;
            $game->save();
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

        if ($request->isXmlHttpRequest()) {
            return response()->json([
                'result' => $itemsR
            ]);
        }
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
