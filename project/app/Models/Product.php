<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable=['name', 'desc', 'quantity', 'price', 'image', 'brand_id', 'featured','img1','img2','img3','img4','system','storage','ram','battery'];

    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id');
    }
}
