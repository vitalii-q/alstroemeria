<?php

namespace engine\Modules;

use engine\Helper\Env;
use engine\Contracts\IMail;
use engine\Modules\Mails\Message;
use engine\Modules\Mails\Subscription;

class Mail // multiton
// OCP - Принцип открытости | закрытости / Open Closed Principle
{
    private static $class = [];

    private $driver; // драйвер текущего экземпляра класса

    private function __construct($driver) {
        $this->driver = $driver;
    }

    private function __clone() {}

    public static function class($driver = null)
    {
        if(!$driver) {
            $driver = Env::get('MAIL_DRIVER'); // основной драйвер
        }

        if(!isset(self::$class[$driver])) {
            self::$class[$driver] = new self($driver);
        }

        return self::$class[$driver];
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
        var_dump('Driver: ' . $this->driver);

        // Mail sending ...
    }
}