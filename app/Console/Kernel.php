<?php
namespace app\Console;

class Kernel
{

    /**
     * The application's command schedule.
     *
     * @return void
     */
    public function schedule()
    {
        var_dump(date('H:i:s D, d M Y'));
    }
}