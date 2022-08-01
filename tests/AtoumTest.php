<?php

namespace CJDevStudios\AtoumShim\Test;

use CJDevStudios\AtoumShim\Atoum;
use PHPUnit\Framework\ExpectationFailedException;

class AtoumTest extends Atoum
{

    public function testAfterDestructionOf(): void
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

    public function testSyntacticSugar(): void
    {
        $this->given($test = 1)
            ->if($test2 = 2)
            ->and($test3 = 3)
            ->then($test4 = $test + $test2 + $test3)
            ->integer($test4)->isEqualTo(6);

        $this
            ->when(static function() use (&$test) {
                $test = 3;
            });
        $this::assertEquals(3, $test);
    }
}
