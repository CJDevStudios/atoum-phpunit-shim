<?php

namespace CJDevStudios\AtoumShim\Test;

use atoum\atoum;

class FloatAsserterTest extends atoum
{
    public function testIsNearlyEqualTo()
    {
        $this->float(0.1)
            ->isNearlyEqualTo(0.1);
    }
}
