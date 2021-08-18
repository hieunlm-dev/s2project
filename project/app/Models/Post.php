<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title','author','slug','contents','image','sort','featured','category_id'];

    // public function getCreatedAtAttribute($date){
    //     return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    // }

    public function category(){
        return $this->belongsTo(PostCategory::class);
    }
}
