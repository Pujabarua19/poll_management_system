<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TextAnswer extends Model
{
    protected $table = 'text_answeres';

    public function poll(){
        return $this->belongsTo(Poll::class, "poll_id", "id");
    }

    public function user(){
        return $this->belongsTo(Register::class, "user_id", "id");
    }
}
