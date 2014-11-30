<?php

namespace Sydnerdrage\SdsTests\Type;

use Sydnerdrage\Sds\Type\DayTime;

class DayTimeTest extends \PHPUnit_Framework_TestCase {

    public function testDayLookup() {
        $dayTime = new DayTime(0, 0, 1, 60); // Midnight Monday morning for 1 hr
        $this->assertEquals("Monday", $dayTime->getDayOfWeek());
    }

    public function testGetters() {
        $dayTime = new DayTime(2, 15, 25, 60);
        $this->assertEquals(2, $dayTime->getDay());
        $this->assertEquals(15, $dayTime->getHour());
        $this->assertEquals(25, $dayTime->getMinute());
        $this->assertEquals(60, $dayTime->getDuration());
    }

    public function testOneHourOverlap() {
        // Monday 12am for 1 hr.
        $a = new DayTime(0, 0, 00, 60);
        $b = new DayTime(0, 0, 00, 60);

        $this->assertEquals(60, $a->overlap($b));
    }

    public function testOneHourDayApartOverlap() {
        // Monday 12am for 1 hr.
        $a = new DayTime(0, 0, 00, 60*25);
        $b = new DayTime(1, 0, 00, 60);

        $this->assertEquals(60, $a->overlap($b));
    }

}
 