<?php
/**
 * Created by PhpStorm.
 * User: Mohamad
 * Date: 6/29/14
 * Time: 8:07 PM
 */

namespace Mohebifar\DateTimeBundle\Calendar\Drivers\Persian;

class DriverFacade
{
    private $formatter;
    private $timeMaker;

    public function __construct()
    {
        $this->formatter = new Formatter();
        $this->timeMaker = new TimeMaker();
    }

    public function makeTime($hour = null, $minute = null, $second = null, $month = null, $day = null, $year = null)
    {
        return $this->timeMaker->makeDateTime($hour, $minute, $second, $month, $day, $year);
    }

    public function format($format, $timestamp = null)
    {
        if (is_null($timestamp)) {
            $timestamp = time();
        }

        $this->formatter->setTimestamp($timestamp);
        return $this->formatter->format($format);
    }
} 