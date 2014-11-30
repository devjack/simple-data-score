<?php

namespace Sydnerdrage\Sds\Calc;

class OverlapCalulator {

    protected $periods = array();

    public function addTimePeriod($periods) {
        if(!is_array($periods)) {
            $periods = (array) $periods;
        }

        $this->periods = array_merge($this->periods, $periods);
    }

    public function calculateOverlap() {
        $minOverlap = $this->periods[0]->overlap($this->periods[1]);
        for($i=0; $i<count($this->periods); $i++) {
            $periodToTest = $this->periods[$i];
            for($j=0; $j<count($this->periods); $j++) {
                if($i == $j ) {
                    continue;
                }
                $overlap = $periodToTest->overlap($this->periods[$j]);

                if ($overlap > 0 && $overlap < $minOverlap) {
                    $minOverlap = $overlap;
                }
            }
        }

        return $minOverlap;
    }

} 