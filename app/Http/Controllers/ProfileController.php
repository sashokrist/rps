<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Profile;
use App\Game;

class ProfileController extends Controller
{
    public function index(){

        $user_id = auth()->user()->id;
        $profiles = Profile::where('user_id', $user_id)->get();
        return view('profile')->with('profiles', $profiles);
    }
}
