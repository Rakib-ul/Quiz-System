<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MCQ extends Model
{
    protected $table = "mcqs";

    function Quiz(){
        return $this->belongsTo(Quiz::class);
    }
}

