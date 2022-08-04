<?php

namespace engine\Modules\Console\CommandsDefault;

use app\Console\Kernel;
use engine\Modules\Console\Command;

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
        $kernel->schedule();

        return true;
    }
}