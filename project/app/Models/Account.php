<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    // xác định table trong db tương ứng với model Account
    protected $table = 'accounts';

    protected $fillable = ['username', 'password', 'email', 'image','role'];
}
