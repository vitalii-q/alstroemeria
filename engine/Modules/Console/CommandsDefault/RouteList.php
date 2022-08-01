<?php

namespace engine\Modules\Console\CommandsDefault;

use engine\Modules\Console\Command;

class RouteList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'route:list {auth}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Show route list';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        echo 'route list';

        return 0;
    }
}