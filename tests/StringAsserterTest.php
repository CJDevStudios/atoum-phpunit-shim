<?php

namespace CJDevStudios\AtoumShim\Test;

use atoum\atoum;

class StringAsserterTest extends atoum
{
    public function testHasLengthLessThan()
    {
        $this->string('test')->hasLengthLessThan(5);
    }

    public function testNotStartWith()
    {
        $this->string('test')->notStartWith('st');
    }

    public function testNotContains()
    {
        $this->string('test')->notContains('tst');
    }

    public function testHasLength()
    {
        $this->string('test')->hasLength(4);
    }

    public function testNotEndWiths()
    {
        $this->string('test')->notEndWiths('te');
    }

    public function testHasLengthGreaterThan()
    {
        $this->string('test')->hasLengthGreaterThan(3);
    }

    public function testMatches()
    {
        $this->string('test')->matches('/^t.*$/');
        $this->string('test')->matches('/^test$/');
    }

    public function testEndWiths()
    {
        $this->string('test')->endWiths('st');
    }

    public function testIsEqualToContentsOfFile()
    {
        // Test reading this file to avoid needing to create anything
        $content = file_get_contents(__FILE__);
        $this->string($content)->isEqualToContentsOfFile(__FILE__);
    }

    public function testContains()
    {
        $this->string('test')->contains('t');
        $this->string('test')->contains('es');
        $this->string('test')->contains('st');
    }

    public function testLength()
    {
        $this->string('test')->length()->isEqualTo(4);
    }

    public function testIsNotEmpty()
    {
        $this->string('test')->isNotEmpty();
    }

    public function testMatch()
    {
        $this->string('test')->match('/^t.*$/');
        $this->string('test')->match('/^test$/');
    }

    public function testStartWith()
    {
        $this->string('test')->startWith('t');
        $this->string('test')->startWith('te');
    }

    public function testIsEmpty()
    {
        $this->string(null)->isEmpty();
        $this->string('')->isEmpty();
    }

    public function testNotMatches()
    {
        $this->string('test')->notMatches('/^ts.*$/');
        $this->string('test')->notMatches('/^teSt$/');
    }
}
