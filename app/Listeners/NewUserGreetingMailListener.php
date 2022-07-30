<?php

namespace app\Listeners;

use engine\Contracts\iListener;

class NewUserGreetingMailListener implements iListener
{
    public function handle($event)
    {
        var_dump('MAIL SEND');
    }
}