<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'poll_options';

    public function poll(){
        return $this->belongsTo(Poll::class, "id", "poll_id");
    }
}
