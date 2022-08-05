<?php

namespace engine\Modules\Console\CommandsDefault;

use app\Console\Kernel;
use engine\Modules\Console\Command;
use engine\Modules\Console\Schedule\Schedule;

class ScheduleWork extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'schedule:work';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Schedule work command';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $kernel = new Kernel();
        $schedule = new Schedule();
        $kernel->schedule($schedule);

        $i = 1; while ($i < 2) { // вечный цикл
            echo 'Starting a loop iteration.'.PHP_EOL;
            $schedule->run();

            sleep(60); // остановить выполнение скрипта на минуту
        }

        return true;
    }
}