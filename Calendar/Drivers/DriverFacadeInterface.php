<?php

namespace Mohebifar\DateTimeBundle\Calendar\Drivers;

interface DriverFacadeInterface
{
    public function makeTime($hour = null, $minute = null, $second = null, $month = null, $day = null, $year = null);

    public function format($format, $timestamp = null);
}