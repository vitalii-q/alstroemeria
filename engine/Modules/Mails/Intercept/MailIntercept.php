<?php

namespace engine\Modules\Mails\Intercept;

class MailIntercept
{
    public function intercept($address)
    {
        // intercept ..

        return 'Intercepted mail for '.$address;
    }
}