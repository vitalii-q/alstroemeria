<?php

namespace app\Models;

use engine\Database\StaticQueryHandler;

class Department
{
    use StaticQueryHandler;

    protected static $table = 'department';
}