<?php

namespace engine\Modules;

use engine\Interfaces\IMail;
use engine\Modules\Mails\Message;
use engine\Modules\Mails\Subscription;

class Mail
// OCP - Принцип открытости | закрытости / Open Closed Principle
{
    private static $class;

    private function __construct() {}

    private function __clone() {}

    public static function class()
    {
        if(is_null(self::$class)) {
            self::$class = new self;
        }

        return self::$class;
    }

    public function message($address)
    {
        self::send(new Message($address));
    }

    public function subscription($address)
    {
        self::send(new Subscription($address));
    }

    public function send(IMail $mail) // DIP - Принцип инверсии зависимостей / The Dependency Inversion Principle
    {
        var_dump($mail->create());

        // Mail sending ...
    }
}