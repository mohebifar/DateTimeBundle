<?php
/**
 * Created by PhpStorm.
 * User: Mohamad
 * Date: 6/29/14
 * Time: 8:26 PM
 */

namespace Mohebifar\DateTimeBundle\Calendar;


use Symfony\Component\Debug\Exception\ClassNotFoundException;

class Proxy {

    private $calendar;

    private $driver;

    public function __construct($driver) {
        $class = "Mohebifar\\DateTimeBundle\\Calendar\\Drivers\\{$driver}\\DriverFacade";

        $this->driver = $driver;

        try {
            $this->calendar = new $class();
        } catch(ClassNotFoundException $e) {
            throw new ClassNotFoundException(sprintf("The driver %s not found.", $driver), $e);
        }
    }

    public function makeTime($hour = null, $minute = null, $second = null, $month = null, $day = null, $year = null)
    {
        return $this->calendar->maketime($hour, $minute, $second, $month, $day, $year);
    }

    public function format($format, $timestamp = null)
    {
        return $this->calendar->format($format, $timestamp);
    }

    public function getDriver() {
        return $this->driver;
    }
} 