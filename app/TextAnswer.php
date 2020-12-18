<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TextAnswer extends Model
{
    protected $table = 'text_answeres';

    public function poll(){
        return $this->belongsTo(Poll::class, "poll_id", "id");
    }
}
