<?php

namespace Mohebifar\DateTimeBundle\Calendar;

class TimeRepresentation
{

    protected $second;
    protected $minute;
    protected $hour;
    protected $year;
    protected $day;
    protected $month;
    protected $dayOfYear;

    /**
     * Get second
     *
     * @return mixed
     */
    public function getSecond()
    {
        return $this->second;
    }

    /**
     * Get minute
     *
     * @return int
     */
    public function getMinute()
    {
        return $this->minute;
    }

    /**
     * Get hour
     *
     * @return mixed
     */
    public function getHour()
    {
        return $this->hour;
    }

    /**
     * Get year
     *
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Get day
     *
     * @return mixed
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * Get month
     *
     * @return mixed
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * Set day of year
     *
     * @return mixed
     */
    public function getDayOfYear()
    {
        return $this->dayOfYear;
    }

    /**
     * Set second
     *
     * @param $second
     */
    public function setSecond($second)
    {
        $this->second = $second;
    }

    /**
     * Set minute
     *
     * @param $minute
     */
    public function setMinute($minute)
    {
        $this->minute = $minute;
    }

    /**
     * Set hour
     *
     * @param $hour
     */
    public function setHour($hour)
    {
        $this->hour = $hour;
    }

    /**
     * Set year
     *
     * @param $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }

    /**
     * @param $day
     */
    public function setDay($day)
    {
        $this->day = $day;
    }

    /**
     * Set month
     *
     * @param $month
     */
    public function setMonth($month)
    {
        $this->month = $month;
    }

    /**
     * Set day of year
     *
     * @param $dayOfYear int
     */
    public function setDayOfYear($dayOfYear)
    {
        $this->dayOfYear = $dayOfYear;
    }
}