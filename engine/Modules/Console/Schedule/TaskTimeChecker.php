<?php

namespace engine\Modules\Console\Schedule;

use engine\Modules\Console\Commands;

class TaskTimeChecker
{
    protected $time;

    public function __construct()
    {
        $this->time = explode(':', date('i:G:j:n:d'));
    }

    public function checkActivationTime($taskTime)
    {
        //var_dump($this->time);

        $timeExp = explode(' ', $taskTime);

        //var_dump($timeExp);

        $minutes = $this->minutes($timeExp[0]);

        if ($minutes === true) {
            return true;
        }
    }

    public function minutes($minutes)
    {
        if($minutes === '*') {
            return true;
        }

        if(strpos($minutes, '*/') !== false) { //
            if($this->time[0] % explode('*/', $minutes)[1] === 0) { // деление времени на заданное колличество минут
                return true;
            }
        }

        if(is_numeric(0)) {
            if ($this->time[0] == $minutes) {
                return true;
            }
        }

        return false;
    }
}