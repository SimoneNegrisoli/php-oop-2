<?php

class Product {
    protected float $price;
    public int $discount = 0;
    protected int $quantity;


    public function __construct($quantity, $price) {
        $this->price = $price;
        $this->quantity = $quantity;

    }
}




?>