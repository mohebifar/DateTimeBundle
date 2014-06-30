<?php
/**
 * Created by PhpStorm.
 * User: Mohamad
 * Date: 6/29/14
 * Time: 8:47 PM
 */

namespace Mohebifar\DateTimeBundle\Calendar;


class TimeRepresentation {
    protected $second;
    protected $minute;
    protected $hour;
    protected $year;
    protected $day;
    protected $month;
    protected $dayOfYear;

    public function getSecond()
    {
        return $this->second;
    }

    public function getMinute()
    {
        return $this->minute;
    }

    public function getHour()
    {
        return $this->hour;
    }

    public function getYear()
    {
        return $this->year;
    }

    public function getDay()
    {
        return $this->day;
    }

    public function getMonth()
    {
        return $this->month;
    }

    public function getDayOfYear()
    {
        return $this->dayOfYear;
    }

    public function setSecond($second)
    {
        $this->second = $second;
    }

    public function setMinute($minute)
    {
        $this->minute = $minute;
    }

    public function setHour($hour)
    {
        $this->hour = $hour;
    }

    public function setYear($year)
    {
        $this->year = $year;
    }

    public function setDay($day)
    {
        $this->day = $day;
    }

    public function setMonth($month)
    {
        $this->month = $month;
    }

    public function setDayOfYear($dayOfYear)
    {
        $this->dayOfYear = $dayOfYear;
    }
} 