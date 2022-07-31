<?php

namespace CJDevStudios\AtoumShim\Test;

use CJDevStudios\AtoumShim\Atoum;
use PHPUnit\Framework\ExpectationFailedException;

class AtoumTest extends Atoum
{

    public function testAfterDestructionOf()
    {
        $with_destructor = new class() {
            public function __destruct()
            {
            }
        };
        $without_destructor = new class() {
        };
        $this->afterDestructionOf($with_destructor);
        $has_failed = false;
        try {
            $this->afterDestructionOf($without_destructor);
        } catch (ExpectationFailedException) {
            // Expected exception
            $has_failed = true;
        }
        $this->assertTrue($has_failed);
    }
}
