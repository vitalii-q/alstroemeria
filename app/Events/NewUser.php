<?php
namespace app\Events;

use engine\Contracts\iEvent;

class NewUser implements iEvent
{
    public $email;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($email)
    {
        $this->email = $email;
    }
}