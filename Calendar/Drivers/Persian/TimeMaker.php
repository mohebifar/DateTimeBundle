<?php

/*
 * Copyright (C) 2014 Mohamad Mohebifar <mohebifar.ir>
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */

namespace Mohebifar\DateTimeBundle\Calendar\Drivers\Persian;

/**
 * Description of Persian
 *
 * @author Mohamad Mohebifar <mohebifar.ir>
 */
class TimeMaker
{
    /**
     * Length of a year
     * Calculated by Khayam is 365.2422 days (approx.);
     * but as the years are getting shorter the new value
     * (valid from year 1380 Per./2000 A.D.) is used instead.
     *
     * @access protected
     * @var double
     */
    protected static $khayamYear = 365.24218956;

    /**
     * Count of days at the end of each Persian month
     *
     * @access protected
     * @var int
     */
    protected static $mountCounter = array(
        0, 31, 62, 93, 124, 155,
        186, 216, 246, 276, 306, 336
    );

    public function makeDateTime($hour, $minute, $second, $month, $day, $year)
    {
        $timestamp = $second;
        $timestamp += $minute * 60;
        $timestamp += $hour * 60 * 60;

        $dayOfYear = ($day + self::$mountCounter[$month - 1]);

        if ($year < 100) {
            $year += 1300;
        }

        $year -= 1348;

        $day = $dayOfYear + round(( self::$khayamYear * $year), 0);
        $day -= 287;
        $timestamp += $day * 86400;

        $datetime = new \DateTime();
        $datetime->setTimestamp($timestamp);

        return $datetime;
    }

}