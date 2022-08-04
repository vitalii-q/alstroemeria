<?php

namespace engine\Modules\Console\Schedule;

use engine\Helper\Converter;
use engine\Modules\Console\Commands;

class TaskTimeChecker
{
    protected $time;

    public function __construct()
    {
        $this->time = Converter::arrayNumericConvertor(explode(':', date('i:G:j:n:d')));
    }

    public function checkActivationTime($taskTime)
    {
        $timeExp = explode(' ', $taskTime);
        $taskTime = Converter::arrayNumericConvertor($timeExp);

        //var_dump($timeExp);
        var_dump($taskTime);
        //exit();

        $minutes = $this->monthDayHourMinute($taskTime[1]);
        $hours = $this->monthDayHourMinute($taskTime[2]);

        if ($minutes === true) {
            return true;
        }

        return false;
    }

    public function monthDayHourMinute($minutes) // $offset, $value
    {
        if($minutes === '*') {
            return true;
        }

        if(strpos($minutes, '*/') !== false) { //
            if($this->time[1] % explode('*/', $minutes)[1] === 0) { // деление времени на заданное колличество минут
                return true;
            }
        }

        if(is_numeric(0)) {
            if ($this->time[1] == $minutes) {
                return true;
            }
        }

        return false;
    }
}