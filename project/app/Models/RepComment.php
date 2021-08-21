<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepComment extends Model
{
    use HasFactory;
    public function rep_cmt (){
        return $this->belongsTo(Comment::class);
    }
}
