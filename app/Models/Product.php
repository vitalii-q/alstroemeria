<?php

namespace app\Models;

use engine\Contracts\Factory\ICloneFactory;
use engine\Database\StaticQueryBuilder;
use engine\Modules\Models;

class Product extends Models implements ICloneFactory
{
    public function __clone()
    {
        $this->setAttribute('name', $this->name . ' clone');
        $this->setAttribute('code', $this->code . '_clone');
        $this->setAttribute('created_at', date('Y-m-d h:m:s'));
        $this->setAttribute('updated_at', date('Y-m-d h:m:s'));
    }
}