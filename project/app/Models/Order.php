<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';

    protected $fillable = [
        'id', 'customer_id', 'order_date', 'first_name', 'last_name',
         'phone_number', 'address','grand_total','item_count','status',
    ];
    public function user(){
        return $this->belongsTo(Customer::class);
    }
    public function orderItems(){
        return $this->hasMany(OrderDetail::class);
    }

}
