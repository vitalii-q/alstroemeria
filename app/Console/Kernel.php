<?php
namespace app\Console;

use engine\Modules\Console\Schedule\Schedule;

class Kernel
{
    /**
     * The application's command schedule.
     *
     * @return void
     */
    public function schedule(Schedule $schedule)
    {
        //$schedule->command('user:create Alex')
        //    ->yearlyOn(10,10, '15:00');

        $schedule->command('user:create Alex')->everyMinute();
    }
}