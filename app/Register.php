<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    public function textans(){
        return $this->hasMany(TextAnswer::class, "user_id", "id");
    }
}
