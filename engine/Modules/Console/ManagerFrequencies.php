<?php

namespace engine\Modules\Console;

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

    protected function spliceIntoPosition($position, $value)
    {
        $segments = explode(' ', $this->frequency);

        $segments[$position - 1] = $value;

        return $this->cron(implode(' ', $segments));
    }
}