<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Profile extends Model
{
    public function userGame(){
        return $this->belongsTo(Game::class);
    }

}
