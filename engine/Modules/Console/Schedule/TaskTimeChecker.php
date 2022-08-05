<?php

namespace engine\Modules\Console\Schedule;

use engine\Helper\Converter;
use engine\Modules\Console\Commands;

class TaskTimeChecker
{
    /**
     * Current time
     *
     * @var array
     */
    protected $time;

    /**
     * Construct current time
     */
    public function __construct()
    {
        //$this->time = Converter::arrayNumericConvertor(explode(':', date('i:G:j:n:d'))); // тестовый
        $this->time = Converter::arrayNumericConvertor(explode(':', '01:15:10:12:07'));
    }

    /**
     * Check task time activation
     *
     * @param $taskTime
     * @return bool
     */
    public function checkActivationTime($taskTime)
    {
        $timeExp = explode(' ', $taskTime);
        $taskTime = Converter::arrayNumericConvertor($timeExp);

        $minutes = $this->checkPosition($taskTime[1], 1);
        $hours = $this->checkPosition($taskTime[2], 2);
        $days = $this->checkPosition($taskTime[3], 3);
        $month = $this->checkPosition($taskTime[4], 4);
        $daysOfWeek = $this->checkPosition($taskTime[5], 5);

        if ($minutes === true and $hours === true and $days === true and $month === true and $daysOfWeek === true) {
            return true;
        }

        return false;
    }

    /**
     * Check task time position
     *
     * @param $value
     * @param $offset
     * @return bool
     */
    public function checkPosition($value, $offset = 1) // $offset, $value
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