<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Game;
use App\Profile;
use Auth;

class ProfileController extends Controller
{
    public function index(){
        $username = auth()->user()->id;
        $rounds = Profile::where('user_id', $username)->orderBy('id', 'desc')->paginate(10);

        $user = User::where('id', $username)->firstOrFail();
        foreach($user->games as $game){
            $gameId = $game->id;
        }
        $countRow = Profile::where('game_id', $gameId)->orderBy('id', 'desc')->get();
        $countR = $countRow->count();
            return view('home', compact('countRow'))->with('user', $user)->with('rounds', $rounds)->with('count', $countR);

    }

    public function profile()
    {
        $user = auth()->user();
       // dd($user);
        return view('profile',compact('user',$user));
    }

    public function update_avatar(Request $request){

        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = auth()->user();
        //dd(auth()->user());
        $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

        $request->avatar->storeAs('avatars',$avatarName);

        $user->avatar = $avatarName;
        $user->save();

        return back()
            ->with('success','You have successfully upload image.');

    }

}
