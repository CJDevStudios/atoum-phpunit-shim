<?php

namespace CJDevStudios\AtoumShim\Test;

use atoum\atoum;

class VariableAsserterTest extends atoum
{

    public function testIsNotFalse()
    {
        $this->variable(true)->isNotFalse();
        $this->variable('test')->isNotFalse();
        $this->variable(1)->isNotFalse();
    }

    public function testIsNotIdenticalTo()
    {
        $this->variable(true)->isNotIdenticalTo(false);
        $this->variable(1)->isNotIdenticalTo('1');
    }

    public function testIsNotNull()
    {
        $this->variable(true)->isNotNull();
        $this->variable('test')->isNotNull();
        $this->variable(1)->isNotNull();
    }

    public function testIsNotEqualTo()
    {
        $this->variable(true)->isNotEqualTo(false);
        $this->variable(1)->isNotEqualTo(2);
    }

    public function testIsIdenticalTo()
    {
        $this->variable(true)->isIdenticalTo(true);
        $this->variable(1)->isIdenticalTo(1);
    }

    public function testIsNull()
    {
        $this->variable(null)->isNull();
    }

    public function testIsNotTrue()
    {
        $this->variable(false)->isNotTrue();
        $this->variable(0)->isNotTrue();
        $this->variable(1)->isNotTrue();
    }

    public function testIsNotCallable()
    {
        $this->variable(1)->isNotCallable();
    }

    public function testIsEqualTo()
    {
        $this->variable(true)->isEqualTo(true);
        $this->variable(1)->isEqualTo('1');
    }

    public function testIsCallable()
    {
        $this->variable(static function () {})->isCallable();
    }
}
