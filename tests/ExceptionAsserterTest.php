<?php

namespace CJDevStudios\AtoumShim\Test;

use atoum\atoum;

class ExceptionAsserterTest extends atoum
{

    public function testHasMessage()
    {
        $this->exception(function () {
            throw new \RuntimeException('foo');
        })->hasMessage('foo');
    }

    public function testHasNestedException()
    {
        $this->exception(function () {
            throw new \RuntimeException('foo', 0, new \JsonException('bar'));
        })->hasNestedException();
        $this->exception(function () {
            throw new \RuntimeException('foo', 0, new \JsonException('bar'));
        })->hasNestedException(\JsonException::class);
    }

    public function testHasCode()
    {
        $this->exception(function () {
            throw new \RuntimeException('foo', 0);
        })->hasCode(0);
        $this->exception(function () {
            throw new \RuntimeException('foo', 10);
        })->hasCode(10);
    }

    public function testHasDefaultCode()
    {
        $this->exception(function () {
            throw new \RuntimeException('foo', 0);
        })->hasDefaultCode();
    }
}
