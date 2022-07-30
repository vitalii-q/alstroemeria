<?php

namespace engine\Modules\Cart;

class Sale
{
    protected $cart;

    public function __construct($cart)
    {
        $this->cart = $cart;
    }

    public function buy()
    {
        echo $this->cart->name . ' (Sale)';
    }
}