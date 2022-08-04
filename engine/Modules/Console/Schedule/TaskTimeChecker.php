<?php

namespace engine\Modules\Console\Schedule;

use engine\Helper\Converter;
use engine\Modules\Console\Commands;

class TaskTimeChecker
{
    protected $time;

    public function __construct()
    {
        //$this->time = Converter::arrayNumericConvertor(explode(':', date('i:G:j:n:d')));
        $this->time = Converter::arrayNumericConvertor(explode(':', '04:00:4:8:04'));
    }

    public function checkActivationTime($taskTime)
    {
        $timeExp = explode(' ', $taskTime);
        $taskTime = Converter::arrayNumericConvertor($timeExp);

        //var_dump($timeExp);
        //var_dump($taskTime);
        //exit();

        $minutes = $this->monthDayHourMinute($taskTime[1], 1);
        $hours = $this->monthDayHourMinute($taskTime[2], 2);

        var_dump($minutes);
        var_dump($hours);

        if ($minutes === true) {
            return true;
        }

        return false;
    }

    public function monthDayHourMinute($value, $offset = 1) // $offset, $value
    {
        if($value === '*') {
            return true;
        }

        if(strpos($value, '*/') !== false) { //
            if($this->time[$offset] % explode('*/', $value)[1] === 0) { // деление времени на заданное колличество минут
                return true;
            }
        }

        if(is_numeric(0)) {
            if ($this->time[$offset] == $value) {
                return true;
            }
        }

        return false;
    }
}