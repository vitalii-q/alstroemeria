<?php

namespace engine\Modules\Mails\Intercept;

class MailIntercept
{
    /**
     * Interceptor
     *
     * @param $address
     * @return string
     */
    public function intercept($address)
    {
        // intercept ..

        return 'Intercepted mail for '.$address;
    }
}