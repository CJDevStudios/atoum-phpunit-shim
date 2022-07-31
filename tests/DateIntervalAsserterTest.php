<?php

namespace CJDevStudios\AtoumShim\Test;

use atoum\atoum;

class DateIntervalAsserterTest extends atoum
{

    public function testIsGreaterThan()
    {
        $this->dateInterval(new \DateInterval('P1Y'))->isGreaterThan(new \DateInterval('P0Y'));
    }

    public function testIsLessThan()
    {
        $this->dateInterval(new \DateInterval('P0Y'))->isLessThan(new \DateInterval('P1Y'));
    }

    public function testIsZero()
    {
        $this->dateInterval(new \DateInterval('P0Y'))->isZero();
    }

    public function testIsGreaterThanOrEqualTo()
    {
        $this->dateInterval(new \DateInterval('P1Y'))->isGreaterThanOrEqualTo(new \DateInterval('P1Y'));
        $this->dateInterval(new \DateInterval('P1Y'))->isGreaterThanOrEqualTo(new \DateInterval('P0Y'));
    }

    public function testIsLessThanOrEqualTo()
    {
        $this->dateInterval(new \DateInterval('P0Y'))->isLessThanOrEqualTo(new \DateInterval('P1Y'));
        $this->dateInterval(new \DateInterval('P0Y'))->isLessThanOrEqualTo(new \DateInterval('P0Y'));
    }
}
