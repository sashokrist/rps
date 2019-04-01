<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Game;
use App\Profile;

class ProfileController extends Controller
{
    public function index(){
        $username = auth()->user()->id;
        $user = User::where('id', $username)->firstOrFail();
        $rounds = Profile::where('user_id', $username)->orderBy('id', 'desc')->get();

        return view('home')->with('user', $user)->with('rounds', $rounds);
    }

}
