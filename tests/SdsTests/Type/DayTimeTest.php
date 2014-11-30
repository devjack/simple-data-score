<?php

namespace Sydnerdrage\SdsTests\Type;

use Sydnerdrage\Sds\Type\DayTime;

class DayTimeTest extends \PHPUnit_Framework_TestCase {

    public function testDayLookup() {
        $dayTime = new DayTime(0, 0, 1); // Midnight Monday morning
        $this->assertEquals("Monday", $dayTime->getDay());
    }

}
 