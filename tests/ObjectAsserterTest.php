<?php

namespace CJDevStudios\AtoumShim\Test;

use atoum\atoum;

class ObjectAsserterTest extends atoum
{

    public function testIsInstanceOfTestedClass()
    {
        //TODO To be implemented
        $this->_skip('To be implemented');
    }

    public function testIsNotTestedInstance()
    {
        //TODO To be implemented
        $this->_skip('To be implemented');
    }

    public function testToString()
    {
        $this->object(new class {
            public function __toString()
            {
                return 'foo';
            }
        })->toString()->isEqualTo('foo');
    }

    public function testIsEmpty()
    {
        $this->object(new class implements \Countable {
            public function count(): int
            {
                return 0;
            }
        })->isEmpty();
    }

    public function testIsInstanceOf()
    {
        $this->object(new class extends \stdClass {})->isInstanceOf(\stdClass::class);
    }

    public function testIsNotInstanceOf()
    {
        $this->object(new class {})->isNotInstanceOf(\Exception::class);
    }

    public function testHasSize()
    {
        $this->object(new class implements \Countable {
            public function count(): int
            {
                return 10;
            }
        })->hasSize(10);
    }

    public function testIsCloneOf()
    {
        $test_obj = new class {};
        $test_obj_2 = clone $test_obj;

        $this->object($test_obj)->isCloneOf($test_obj_2);
    }

    public function testIsTestedInstance()
    {
        //TODO To be implemented
        $this->_skip('To be implemented');
    }
}
