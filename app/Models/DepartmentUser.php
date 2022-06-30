<?php

namespace app\Models;

use engine\Database\StaticQueryHandler;

class DepartmentUser
{
    use StaticQueryHandler;

    /**
     * table name variable
     *
     * @var string
     */
    protected static $table = 'department_user';
}