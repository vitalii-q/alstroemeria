<?php
namespace app\Suppliers;

use engine\Foundation\Suppliers;

class DateTimeSupplier extends Suppliers
{
    /**
     * Passing a variable with the date to the theme service
     *
     * @return mixed|void
     */
    public function supply()
    {
        $this->theme->setVariable('date', date('d F, Y (l)'));
    }
}