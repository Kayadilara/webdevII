<?php

namespace App\Services;

class CartItem
{
    public $id;
    public $name;
    public $quantity;
    public $price;
    public $type;

    public function __construct($data)
    {
        $this->quantity = $data['quantity'];
        $this->price = $data['price'];
        $this->name = $data['name'];
        $this->id = $data['id'];
        $this->type = $data['type'];
    }

    public function getTotal()
    {
        return $this->price * $this->quantity;
    }

}

