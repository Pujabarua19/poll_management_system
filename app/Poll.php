<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    protected $table ="polls";


    public function answers(){
        return $this->hasMany(Answer::class,"poll_id","id");
    }
    public function package(){
        return $this->belongsTo(Package::class,"package_id","id");
    }
    public function user(){
        return $this->belongsTo(Register::class,"user_id","id");
    }
}
