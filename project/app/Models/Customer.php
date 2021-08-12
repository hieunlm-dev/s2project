<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $fillable = ['email', 'password','firstname','lastname','phone','address'];
    
    public function orders(){
        return $this->hasMany(Order::class);
    }
    public function wishList(){
        return $this->hasMany(WishList::class);
    }
}
