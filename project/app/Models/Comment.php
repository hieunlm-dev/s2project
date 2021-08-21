<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable =['username','contents','rate','pid'];
    public function cmt(){
        return $this->belongsTo(Products::class);
    }
  
}
