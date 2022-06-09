<?php

namespace app\Models;

use app\Engine\Database\StaticQueryHandler;

class Department
{
    use StaticQueryHandler;

    protected static $table = 'department';
}