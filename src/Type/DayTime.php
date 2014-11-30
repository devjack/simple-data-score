<?php
/**
 * Created by PhpStorm.
 * User: jack
 * Date: 25/11/14
 * Time: 5:14 PM
 */

namespace Sydnerdrage\Sds\Type;

class DayTime {

    protected $day;
    protected $hour;
    protected $minute;

    protected $duration;

    public static $days = [
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday',
        'Sunday',
    ];


    const MINUTES_IN_DAY = 1440;
    const MINUTES_IN_HOUR = 60;

    public function __construct($day, $hour, $minute, $duration) {
        $this->day = $day;
        $this->hour = $hour;
        $this->minute = $minute;
        $this->duration = $duration;
    }

    public function getDay() {
        return $this->day;
    }

    public function getDayOfWeek()
    {
        return self::$days[$this->day];
    }

    public function getHour() {
        return $this->hour;
    }

    public function getMinute() {
        return $this->minute;
    }

    public function getDuration() {
        return $this->duration;
    }

    public function overlap(DayTime $b) {
        // Seconds from commencement of the week;
        $selfMinutes = $this->getDay() * self::MINUTES_IN_DAY
            + $this->getHour() * self::MINUTES_IN_HOUR
            + $this->getMinute();

        $bMinutes = $b->getDay() * self::MINUTES_IN_DAY
            + $b->getHour() * self::MINUTES_IN_HOUR
            + $b->getMinute();

        if($selfMinutes > $bMinutes) {
            // I start before the other does
            return min($bMinutes+$b->getDuration(), $selfMinutes+$this->getDuration()) - $selfMinutes;
        }

        // Does this DayTime end overlap with the $b period?
        if($selfMinutes + $this->getDuration() < $bMinutes) {
            // No overlap - return 0;
            return 0;
        }

        $selfEnd = $selfMinutes + $this->getDuration();
        $bEnd = $bMinutes + $b->getDuration();

        if($selfEnd < $bEnd){
            // I end before $b ends
            return $bMinutes + ($bEnd - $selfEnd);
        }

        return $b->getDuration();



    }

}