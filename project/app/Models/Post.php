<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title','slug','contents','image','sort','featured','category_id'];

    public function category(){
        return $this->belongsTo(PostCategory::class);
    }
}
