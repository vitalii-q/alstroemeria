<?php

namespace engine\Modules\Mails\Intercept;

use engine\Contracts\IMail;

class MailInterceptAdapter implements IMail // ПП Adapter
{
    /**
     * Interceptor
     *
     * @var MailIntercept
     */
    protected $interceptClass;

    /**
     * mail address for massage
     *
     * @var
     */
    protected $address;

    /**
     * Construct mail intercept class
     *
     * @param $address
     */
    public function __construct($address)
    {
        $this->interceptClass = new MailIntercept();
        $this->address = $address;
    }

    /**
     * Adapting for mail intercept
     *
     * @return string
     */
    public function create()
    {
        return $this->interceptClass->intercept($this->address);
    }
}