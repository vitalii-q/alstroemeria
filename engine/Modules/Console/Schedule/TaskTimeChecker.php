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
        $this->time = Converter::arrayNumericConvertor(explode(':', '01:15:10:12:07'));
    }

    public function checkActivationTime($taskTime)
    {
        $timeExp = explode(' ', $taskTime);
        $taskTime = Converter::arrayNumericConvertor($timeExp);

        //var_dump($timeExp);
        var_dump($taskTime);
        //exit();

        $minutes = $this->monthDayHourMinute($taskTime[1], 1);
        $hours = $this->monthDayHourMinute($taskTime[2], 2);
        $days = $this->monthDayHourMinute($taskTime[3], 3);
        $month = $this->monthDayHourMinute($taskTime[4], 4);
        $daysOfWeek = $this->monthDayHourMinute($taskTime[5], 5);

        var_dump($minutes);
        var_dump($hours);
        var_dump($days);
        var_dump($month);
        var_dump($daysOfWeek);

        if ($minutes === true and $hours === true and $days === true and $month ===true and $daysOfWeek === true) {
            return true;
        }

        return false;
    }

    public function monthDayHourMinute($value, $offset = 1) // $offset, $value
    {
        // если каждый интервал
        if($value === '*') {
            return true;
        }

        // если каждый указанный отрезок времени
        if(strpos($value, '*/') !== false) {
            if($this->time[$offset] % explode('*/', $value)[1] === 0) { // деление времени на заданное колличество минут
                return true;
            }
        }

        // если в заданное число
        if(is_numeric(0)) {
            if ($this->time[$offset] == $value) {
                return true;
            }
        }

        // если несколько указанных чисел
        if(strpos($value, ',') !== false) { // возвращает позицию первого вхождения подстроки
            $expValue = explode(',', $value);

            foreach ($expValue as $part) {
                if($this->time[$offset] == $part) {
                    return true;
                }
            }
        }

        // если укзанно от - до
        if(strpos($value, '-') !== false) {
            $array = [1,2,3,4,5,6,7];
            $expValue = explode('-', $value);

            foreach ($array as $part) {
                if($part >= $expValue[0] and $part <= $expValue[1] and $part == $this->time[$offset]) {
                    return true;
                }
            }
        }

        return false;
    }
}