<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'answeres';

    public function poll(){
        return $this->belongsTo(Poll::class, "id", "poll_id");
    }
}
