<?php

namespace CJDevStudios\AtoumShim\Test;

use atoum\atoum;

class ClassAsserterTest extends atoum
{

    public function testIsFinal()
    {
        $this->class(TestFinalClass::class)
            ->isFinal();
    }

    public function testHasNoParent()
    {
        $this->class(TestFinalClass::class)
            ->hasNoParent();
    }

    public function testHasConstant()
    {
        $this->class(TestFinalClass::class)
            ->hasConstant('TEST_CONSTANT');
    }

    public function testHasMethod()
    {
        $this->class(TestFinalClass::class)
            ->hasMethod('testMethod');
    }

    public function testIsAbstract()
    {
        $this->class(TestAbstractClass::class)
            ->isAbstract();
    }

    public function testHasInterface()
    {
        $this->class(TestSubClass::class)
            ->hasInterface(TestInterface::class);
    }

    public function testHasParent()
    {
        $this->class(TestSubClass::class)
            ->hasParent(TestAbstractClass::class);
    }

    public function testIsSubclassOf()
    {
        $this->class(TestSubClass::class)
            ->isSubclassOf(TestAbstractClass::class);
    }
}

final class TestFinalClass
{
    public const TEST_CONSTANT = 'test';

    public function testMethod(): void
    {
    }
}

interface TestInterface
{
}

abstract class TestAbstractClass
{

}

class TestSubClass extends TestAbstractClass implements TestInterface
{

}
