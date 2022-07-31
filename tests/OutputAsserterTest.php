<?php

namespace CJDevStudios\AtoumShim\Test;

use atoum\atoum;

class OutputAsserterTest extends atoum
{
    public function testInitialization(): void
    {
        $this->output(static function() {
            echo 'test';
        })->isEqualTo('test');
    }
}
