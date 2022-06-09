<?php
namespace app\Models;

use app\Engine\Database\StaticQueryHandler;

class User
{
    use StaticQueryHandler;

    protected static $table = 'user';
}