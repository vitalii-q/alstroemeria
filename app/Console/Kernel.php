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
        //$schedule->command('user:create Alex')->everyMinute();
        $schedule->command('user:create Alex')->days(1,2,3)->hourlyAt(8);
    }
}