<?php

namespace CJDevStudios\AtoumShim\Test;

use atoum\atoum;

class BooleanAsserterTest extends atoum
{

    public function testIsTrue()
    {
        $this->boolean(true)->isTrue();
    }

    public function testIsFalse()
    {
        $this->boolean(false)->isFalse();
    }
}
