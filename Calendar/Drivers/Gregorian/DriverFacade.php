<?php
/**
 * Created by PhpStorm.
 * User: Mohamad
 * Date: 6/29/14
 * Time: 8:07 PM
 */

namespace Mohebifar\DateTimeBundle\Calendar\Drivers\Gregorian;


class DriverFacade
{
    public function makeTime($hour = null, $minute = null, $second = null, $month = null, $day = null, $year = null)
    {
        return mktime($hour, $minute, $second, $month, $day, $year);
    }

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