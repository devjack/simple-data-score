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

    public static $days = [
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday',
        'Sunday',
    ];

    public function __construct($day, $hour, $minute) {
        $this->day = $day;
        $this->hour = $hour;
        $this->minute = $minute;
    }

    public function getDay()
    {
        return self::$days[$this->day];
    }

    public function getHour() {
        return $this->hour;
    }

    public function getMinute() {
        return $this->minute;
    }

} 