<?php
namespace app\Models;

use engine\Contracts\Factory\IUser;
use engine\Database\StaticQueryHandler;

class User implements IUser
{
    use StaticQueryHandler;

    /**
     * Users table name variable
     *
     * @var string
     */
    protected static $table = 'user';

    protected $name;

    protected $email;

    protected $role;

    public function __construct($name, $email, $role = 'user')
    {
        $this->name = $name;
        $this->email = $email;
        $this->role = $role;
    }

    public function getName(): float
    {
        return $this->name;
    }

    public function getEmail(): float
    {
        return $this->email;
    }

    public function getRole(): float
    {
        return $this->role;
    }
}