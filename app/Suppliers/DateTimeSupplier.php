<?php
namespace app\Suppliers;

use app\Engine\Foundation\Suppliers;

class DateTimeSupplier extends Suppliers
{
    public function supply()
    {
        $this->theme->setVariable('date', date('d F, Y (l)'));
    }
}