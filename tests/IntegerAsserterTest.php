<?php

namespace CJDevStudios\AtoumShim\Test;

use atoum\atoum;

class IntegerAsserterTest extends atoum
{
    public function testIsLessThanOrEqualTo()
    {
        $this->integer(1)->isLessThanOrEqualTo(1);
    }

    public function testIsGreaterThan()
    {
        $this->integer(1)->isGreaterThan(0);
    }

    public function testIsLessThan()
    {
        $this->integer(1)->isLessThan(2);
    }

    public function testIsGreaterThanOrEqualTo()
    {
        $this->integer(1)->isGreaterThanOrEqualTo(1);
    }

    public function testIsZero()
    {
        $this->integer(0)->isZero();
    }
}
