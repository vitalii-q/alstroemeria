<?php
namespace app\Services\View;

class DataProvider
{
    /**
     * Data suppliers list
     *
     * @var string[]
     */
    protected $suppliers = [
        'DateTimeSupplier',
        'HelloSupplier'
    ];

    /**
     * Running the supplier handling
     *
     * @param $theme
     * @return void
     */
    public function boot($theme)
    {
        foreach ($this->suppliers as $supplierName) {
            $supplier = $this->getSupplier($supplierName);
            $supplier = new $supplier($theme);
            $supplier->supply();
        }
    }

    /**
     * Getting supplier classes
     *
     * @param $supplierName
     * @return string
     */
    public function getSupplier($supplierName): string
    {
        return 'app\Suppliers\\' . $supplierName;
    }
}

