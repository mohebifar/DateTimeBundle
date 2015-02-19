<?php

namespace Mohebifar\DateTimeBundle\Calendar\Drivers\Gregorian;

use Mohebifar\DateTimeBundle\Calendar\Drivers\DriverFacadeInterface;

class DriverFacade implements DriverFacadeInterface
{

    /**
     * Make a date time object by given time
     *
     * @param int $hour
     * @param int $minute
     * @param int $second
     * @param int $month
     * @param int $day
     * @param int $year
     * @return \DateTime
     */
    public function makeTime($hour = null, $minute = null, $second = null, $month = null, $day = null, $year = null)
    {
        $datetime = new \DateTime();
        $datetime->setTimestamp(mktime($hour, $minute, $second, $month, $day, $year));

        return $datetime;
    }

    /**
     * Format a timestamp by given pattern
     *
     * @param string $format
     * @param int|\DateTime $timestamp
     * @return bool|string
     */
    public function format($format, $timestamp = null)
    {
        if (is_null($timestamp)) {
            return date($format);
        }

        if ($timestamp instanceof \DateTime) {
            $timestamp = $timestamp->getTimestamp();
        }

        return date($format, $timestamp);
    }
} 