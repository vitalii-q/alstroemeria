<?php
namespace app\Models;

use engine\Contracts\Factory\IUser;
use engine\Database\StaticQueryBuilder;
use engine\Modules\Models;

class User extends Models implements IUser
{
    public function makeUser($name, $email, $role = 'user')
    {
        $this->setAttribute('name', $name);
        $this->setAttribute('email', $email);
        $this->setAttribute( 'role', $role);

        return $this;
    }
}