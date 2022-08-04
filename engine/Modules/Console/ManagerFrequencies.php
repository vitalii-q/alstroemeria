<?php

namespace engine\Modules\Console;

use engine\Modules\Console\Schedule\Schedule;

trait ManagerFrequencies
{
    protected function cron($expression)
    {
        $this->frequency = $expression;

        return $this;
    }

    /**
     * Schedule the event to run every minute.
     *
     * @return $this
     */
    public function everyMinute()
    {
        return $this->spliceIntoPosition(1, '*');
    }

    /**
     * Schedule the event to run every two minutes.
     *
     * @return $this
     */
    public function everyTwoMinutes()
    {
        return $this->spliceIntoPosition(1, '*/2');
    }

    /**
     * Schedule the event to run every three minutes.
     *
     * @return $this
     */
    public function everyThreeMinutes()
    {
        return $this->spliceIntoPosition(1, '*/3');
    }

    /**
     * Schedule the event to run every four minutes.
     *
     * @return $this
     */
    public function everyFourMinutes()
    {
        return $this->spliceIntoPosition(1, '*/4');
    }

    /**
     * Schedule the event to run every five minutes.
     *
     * @return $this
     */
    public function everyFiveMinutes()
    {
        return $this->spliceIntoPosition(1, '*/5');
    }

    /**
     * Schedule the event to run every ten minutes.
     *
     * @return $this
     */
    public function everyTenMinutes()
    {
        return $this->spliceIntoPosition(1, '*/10');
    }

    /**
     * Schedule the event to run every fifteen minutes.
     *
     * @return $this
     */
    public function everyFifteenMinutes()
    {
        return $this->spliceIntoPosition(1, '*/15');
    }

    /**
     * Schedule the event to run every thirty minutes.
     *
     * @return $this
     */
    public function everyThirtyMinutes()
    {
        return $this->spliceIntoPosition(1, '*/30');
    }

    /**
     * Schedule the event to run hourly.
     *
     * @return $this
     */
    public function hourly()
    {
        return $this->spliceIntoPosition(1, 0);
    }

    /**
     * Schedule the event to run hourly at a given offset in the hour.
     *
     * @param  array|int  $offset
     * @return $this
     */
    public function hourlyAt($hour)
    {
        return $this->spliceIntoPosition(1, 0)->spliceIntoPosition(2, $hour);
    }

    /**
     * Schedule the event to run every two hours.
     *
     * @return $this
     */
    public function everyTwoHours()
    {
        return $this->spliceIntoPosition(1, 0)
            ->spliceIntoPosition(2, '*/2');
    }

    /**
     * Schedule the event to run every three hours.
     *
     * @return $this
     */
    public function everyThreeHours()
    {
        return $this->spliceIntoPosition(1, 0)
            ->spliceIntoPosition(2, '*/3');
    }

    /**
     * Schedule the event to run every four hours.
     *
     * @return $this
     */
    public function everyFourHours()
    {
        return $this->spliceIntoPosition(1, 0)
            ->spliceIntoPosition(2, '*/4');
    }

    /**
     * Schedule the event to run every six hours.
     *
     * @return $this
     */
    public function everySixHours()
    {
        return $this->spliceIntoPosition(1, 0)
            ->spliceIntoPosition(2, '*/6');
    }

    /**
     * Schedule the event to run daily.
     *
     * @return $this
     */
    public function daily()
    {
        return $this->spliceIntoPosition(1, 0)
            ->spliceIntoPosition(2, 0);
    }

    /**
     * Schedule the command at a given time.
     *
     * @param  string  $time
     * @return $this
     */
    public function at($time)
    {
        return $this->dailyAt($time);
    }

    /**
     * Schedule the event to run daily at a given time (10:00, 19:30, etc).
     *
     * @param  string  $time
     * @return $this
     */
    public function dailyAt($time)
    {
        $segments = explode(':', $time);

        return $this->spliceIntoPosition(2, (int) $segments[0])
            ->spliceIntoPosition(1, count($segments) === 2 ? (int) $segments[1] : '0');
    }

    /**
     * Schedule the event to run twice daily.
     *
     * @param  int  $first
     * @param  int  $second
     * @return $this
     */
    public function twiceDaily($first = 1, $second = 13)
    {
        return $this->twiceDailyAt($first, $second, 0);
    }

    /**
     * Schedule the event to run twice daily at a given offset.
     *
     * @param  int  $first
     * @param  int  $second
     * @param  int  $offset
     * @return $this
     */
    public function twiceDailyAt($first = 1, $second = 13, $offset = 0)
    {
        $hours = $first.','.$second;

        return $this->spliceIntoPosition(1, $offset)
            ->spliceIntoPosition(2, $hours);
    }

    /**
     * Schedule the event to run only on weekdays.
     *
     * @return $this
     */
    public function weekdays()
    {
        return $this->days(Schedule::MONDAY.'-'.Schedule::FRIDAY);
    }

    /**
     * Schedule the event to run only on weekends.
     *
     * @return $this
     */
    public function weekends()
    {
        return $this->days(Schedule::SATURDAY.','.Schedule::SUNDAY);
    }

    /**
     * Schedule the event to run only on Mondays.
     *
     * @return $this
     */
    public function mondays()
    {
        return $this->days(Schedule::MONDAY);
    }

    /**
     * Schedule the event to run only on Tuesdays.
     *
     * @return $this
     */
    public function tuesdays()
    {
        return $this->days(Schedule::TUESDAY);
    }

    /**
     * Schedule the event to run only on Wednesdays.
     *
     * @return $this
     */
    public function wednesdays()
    {
        return $this->days(Schedule::WEDNESDAY);
    }

    /**
     * Schedule the event to run only on Thursdays.
     *
     * @return $this
     */
    public function thursdays()
    {
        return $this->days(Schedule::THURSDAY);
    }

    /**
     * Schedule the event to run only on Fridays.
     *
     * @return $this
     */
    public function fridays()
    {
        return $this->days(Schedule::FRIDAY);
    }

    /**
     * Schedule the event to run only on Saturdays.
     *
     * @return $this
     */
    public function saturdays()
    {
        return $this->days(Schedule::SATURDAY);
    }

    /**
     * Schedule the event to run only on Sundays.
     *
     * @return $this
     */
    public function sundays()
    {
        return $this->days(Schedule::SUNDAY);
    }

    protected function spliceIntoPosition($position, $value)
    {
        $segments = explode(' ', $this->frequency);

        $segments[$position - 1] = $value;

        return $this->cron(implode(' ', $segments));
    }
}