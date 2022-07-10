<?php

namespace engine\Modules\Cart;

interface iCartBridge // ПП bridge
{
    public function __construct($cart);

    public function buy();
}