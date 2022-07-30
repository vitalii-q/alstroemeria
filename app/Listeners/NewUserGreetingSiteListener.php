<?php
namespace app\Listeners;

use engine\Contracts\iListener;

class NewUserGreetingSiteListener implements iListener
{
    public function handle($event)
    {
        var_dump($event->email . ' EEEEEE');
    }
}