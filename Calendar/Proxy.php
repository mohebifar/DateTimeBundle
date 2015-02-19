<?php

namespace Mohebifar\DateTimeBundle\Calendar;

use Mohebifar\DateTimeBundle\Calendar\Drivers\DriverFacadeInterface;
use Symfony\Component\Debug\Exception\ClassNotFoundException;

class Proxy {

    /**
     * @var DriverFacadeInterface
     */
    private $calendar;

    /**
     * The name of driver
     *
     * @var string
     */
    private $driver;

    /**
     * Create an instance of DriverFacade for this proxy by given driver name
     *
     * @param $driver The name of driver
     * @throws ClassNotFoundException
     */
    public function __construct($driver) {

        if(is_class($driver)) {
            $class = $driver;
        } else {
            $class = "Mohebifar\\DateTimeBundle\\Calendar\\Drivers\\{$driver}\\DriverFacade";
        }

        $this->driver = $driver;

        try {
            $this->calendar = new $class();
        } catch(ClassNotFoundException $e) {
            throw new ClassNotFoundException(sprintf("The driver %s not found.", $driver), $e);
        }
    }

    /**
     * Make a date time object by given time in given driver calendar
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
        return $this->calendar->maketime($hour, $minute, $second, $month, $day, $year);
    }

    /**
     * Format a timestamp by given pattern according to given driver
     *
     * @param string $format
     * @param int|\DateTime $timestamp
     * @return bool|string
     */
    public function format($format, $timestamp = null)
    {
        return $this->calendar->format($format, $timestamp);
    }

    /**
     * @return string The name of this driver
     */
    public function getDriver() {
        return $this->driver;
    }
} 