<?php

namespace engine\Factory\StaticFactory;

use app\Models\Department;
use app\Models\DepartmentUser;
use app\Models\User;

class UserFactory // ПП Static Factory / Статическая фабрика
{
    protected static int $fabricated = 0;

    public static function make($name, $email, $department, $role = 'user'): User
    {
        self::$fabricated++;

        return new User($name, $email, $role);
    }

    public static function fabricated(): int // получить колличество сфабрикованных пользователей
    {
        return self::$fabricated;
    }
}