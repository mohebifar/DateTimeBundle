<?php

namespace Mohebifar\DateTimeBundle\Calendar\Drivers\Persian;

use Mohebifar\DateTimeBundle\Calendar\Drivers\DriverFacadeInterface;

class DriverFacade implements DriverFacadeInterface
{
    /**
     * The date time formatter object
     *
     * @var Formatter
     */
    private $formatter;

    /**
     * The time maker object
     *
     * @var TimeMaker
     */
    private $timeMaker;

    /**
     * Create an instance of DriverFacade and initiating the properties
     */
    public function __construct()
    {
        $this->formatter = new Formatter();
        $this->timeMaker = new TimeMaker();
    }

    /**
     * Make a date time object by given time in persian calendar
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
        return $this->timeMaker->makeDateTime($hour, $minute, $second, $month, $day, $year);
    }

    /**
     * Format a timestamp by given pattern according to persian calendar
     *
     * @param string $format
     * @param int|\DateTime $timestamp
     * @return bool|string
     */
    public function format($format, $timestamp = null)
    {
        if (is_null($timestamp)) {
            $timestamp = time();
        }

        $this->formatter->setTimestamp($timestamp);
        return $this->formatter->format($format);
    }
} 