<?php
namespace app\Suppliers;

use engine\Foundation\Suppliers;

class DateTimeSupplier extends Suppliers
{
    public function supply()
    {
        $this->theme->setVariable('date', date('d F, Y (l)'));
    }
}