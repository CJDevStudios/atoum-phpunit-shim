<?php

namespace CJDevStudios\AtoumShim\Test;

use atoum\atoum;

class ErrorAsserterTest extends atoum
{
    public function testWithAnyType()
    {
        $this->error(static function() {
            trigger_error('Error message', E_USER_ERROR);
        })->withAnyType();
    }

    public function testWithMessage()
    {
        $this->error(static function() {
            trigger_error('Error message', E_USER_ERROR);
        })->withMessage('Error message');
    }

    public function testWithAnyMessage()
    {
        $this->error(static function() {
            trigger_error('Error message', E_USER_ERROR);
        })->withAnyMessage();
    }

    public function testWithPattern()
    {
        $this->error(static function() {
            trigger_error('Error message', E_USER_ERROR);
        })->withPattern('/^Error message$/');
    }

    public function testWithType()
    {
        $this->error(static function() {
            trigger_error('Error message', E_USER_ERROR);
        })->withType(E_USER_ERROR);

        $this->error(static function() {
            trigger_error('Error message', E_USER_WARNING);
        })->withType(E_USER_WARNING);
    }

    public function testExists()
    {
        $this->error(static function() {
            trigger_error('Error message', E_USER_ERROR);
        })->exists();
    }

    public function testNotExists()
    {
        $this->error(static function() {})->notExists();
    }
}
