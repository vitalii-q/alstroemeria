<?php

namespace engine\Modules\Mails\Intercept;

use engine\Contracts\IMail;

class MailInterceptAdapter implements IMail // ПП Adapter
{
    protected $interceptClass;

    protected $adress;

    public function __construct($address)
    {
        $this->interceptClass = new MailIntercept();
        $this->adress = $address;
    }

    public function create()
    {
        return $this->interceptClass->intercept($this->adress);
    }
}