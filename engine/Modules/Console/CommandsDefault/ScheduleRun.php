<?php

namespace engine\Modules\Console\CommandsDefault;

use app\Console\Kernel;
use engine\Modules\Console\Command;
use engine\Modules\Console\Schedule\Schedule;

class ScheduleRun extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'schedule:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Schedule run command';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $kernel = new Kernel();
        $kernel->schedule($schedule = new Schedule());
        $schedule->run();

        return true;
    }
}