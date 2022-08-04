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
        $taskTime = $this->timeConverter($taskTime);

        //var_dump($timeExp);
        //var_dump($timeExp);
        exit();

        $minutes = $this->monthDayHourMinute($taskTime[0]);
        $minutes = $this->monthDayHourMinute($taskTime[1]);

        if ($minutes === true) {
            return true;
        }
    }

    public function monthDayHourMinute($minutes)
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

    private function timeConverter($taskTime)
    {
        $timeExp = explode(' ', $taskTime);

        $time = [];
        foreach ($timeExp as $key => $item) {
            $time[$key + 1] = $item;
        }

        return $time;
    }
}