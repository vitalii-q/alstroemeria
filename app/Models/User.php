<?php
namespace app\Models;

use engine\Database\StaticQueryHandler;

class User
{
    use StaticQueryHandler;

    protected static $table = 'user';
}