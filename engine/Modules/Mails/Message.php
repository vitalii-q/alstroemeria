<?php

namespace engine\Modules\Mails;

use engine\Interfaces\IMail;

class Message implements IMail
{
    protected $address;

    public function __construct($address)
    {
        $this->address = $address;
    }

    public function create()
    {
        return 'created message for: ' . $this->address;
    }
}