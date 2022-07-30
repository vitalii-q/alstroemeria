<?php

namespace engine\Factory\StaticFactory;

use app\Models\User;

class UserFactory // ПП Static Factory / Статическая фабрика
{
    protected static int $fabricated = 0;

    public static function make($name, $email, $department, $role = 'user'): User
    {
        self::$fabricated++;

        $user = new User();
        return $user->makeUser($name, $email, $role);
    }

    public static function fabricated(): int // получить колличество сфабрикованных пользователей
    {
        return self::$fabricated;
    }
}