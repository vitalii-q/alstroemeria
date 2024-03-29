<?php

namespace engine\Modules\Mails;

use engine\Contracts\IMail;

class Subscription implements IMail
{
    protected $address;

    public function __construct($address)
    {
        $this->address = $address;
    }

    public function create()
    {
        return 'created subscription for: ' . $this->address;
    }
}