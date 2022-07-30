<?php

namespace engine\Modules\Cart;

class Offer implements iCartBridge
{
    protected $cart;

    public function __construct($cart)
    {
        $this->cart = $cart;
    }

    public function buy()
    {
        echo $this->cart->name . ' (Offer)';
    }
}