<?php
namespace app\Models;

use engine\Database\StaticQueryHandler;

class User
{
    use StaticQueryHandler;

    /**
     * Users table name variable
     *
     * @var string
     */
    protected static $table = 'user';
}