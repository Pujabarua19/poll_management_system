<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    public function textans(){
        return $this->hasMany(TextAnswer::class, "user_id", "id");
    }

    public function votes(){
        return $this->belongsToMany(Poll::class,"user_vote","user_id", "poll_id")->withPivot("voted_option");
    }
}
