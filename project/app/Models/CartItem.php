<?php

namespace App\Models;

class CartItem
{
    public $id;
    public $name;
    public $quantity;
    public $price;
    public $image;

    //khai bao ham dung
    public function __construct($id,$name,$quantity,$price,$image){
        $this->id=$id;
        $this->name=$name;
        $this->quantity=$quantity;
        $this->price=$price;
        $this->image=$image;
    }

}