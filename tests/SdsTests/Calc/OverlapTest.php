<?php

namespace SdsTests\Calc;

use Sydnerdrage\Sds\Calc\OverlapCalulator;
use Sydnerdrage\Sds\Type\DayTime;

class OverlapTest extends \PHPUnit_Framework_TestCase {

    /**
     * @dataProvider dayTimeOverlapProvider
     */
    public function testOverlapInGroup($timePeriods, $expectedOverlap) {

        $calculator = new OverlapCalulator();
        $calculator->addTimePeriod($timePeriods);

        $this->assertEquals($expectedOverlap, $calculator->calculateOverlap());
    }

    public function dayTimeOverlapProvider() {
        return [
            [
                [   new DayTime(0, 10, 00, 60),
                    new DayTime(0, 10, 00, 90),
                ],
                60, // 60 minutes overlap.
            ],
            [
                [   new DayTime(0, 10, 00, 60),
                    new DayTime(0, 10, 00, 90),
                    new DayTime(0, 10, 30, 60),
                ],
                30, // 60 minutes overlap.
            ]
        ];
    }
}
