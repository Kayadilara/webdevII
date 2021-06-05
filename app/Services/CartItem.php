<?php

namespace App\Services;

class CartItem
{
    public $id;
    public $name;
    public $quantity;
    public $price;

    public function __construct($data)
    {
        $this->quantity = $data['quantity'];
        $this->price = $data['price'];
        $this->name = $data['name'];
        $this->id = $data['id'];
    }

    public function getTotal()
    {
        return $this->price * $this->quantity;
    }

}

