<?php

namespace CJDevStudios\AtoumShim;

use CJDevStudios\AtoumShim\Asserter as Asserter;
use PHPUnit\Framework\TestCase;

/**
 * @property object newTestedInstance
 */
class Atoum extends TestCase
{
    /**
     * @var class-string
     */
    private $test_class;
    /**
     * @var object
     */
    private $tested_instance;

    public function __get(string $name)
    {
        if ($name === 'newTestedInstance') {
            if ($this->test_class === null) {
                return null;
            }
            $this->tested_instance = new $this->test_class;
        }
    }

    public function __set(string $name, $value): void
    {
    }

    public function __isset(string $name): bool
    {
    }

    public function getTestedInstance(): object
    {
        return $this->tested_instance;
    }

    public function _skip(string $message = ''): void
    {
        $this->markTestSkipped($message);
    }

    public function array(mixed $value): Asserter\ArrayAsserter
    {
        return new Asserter\ArrayAsserter($this, $value);
    }

    public function boolean(mixed $value): Asserter\BooleanAsserter
    {
        return new Asserter\BooleanAsserter($this, $value);
    }

    public function castToArray(mixed $value): Asserter\ArrayAsserter
    {
        $has_magic_method = method_exists($value, '__toArray');
        $is_array_like = is_array($value) || $value instanceof \ArrayAccess;

        $this::assertTrue($has_magic_method || $is_array_like);
        if ($has_magic_method) {
            return new Asserter\ArrayAsserter($this, $value->__toArray());
        }
        return new Asserter\ArrayAsserter($this, $value);
    }

    public function castToString(mixed $value): Asserter\StringAsserter
    {
        $has_magic_method = method_exists($value, '__toString');
        $is_string_like = is_string($value) || $value instanceof \Stringable;

        $this::assertTrue($has_magic_method || $is_string_like);
        if ($has_magic_method) {
            return new Asserter\StringAsserter($this, $value->__toString());
        }
        return new Asserter\StringAsserter($this, (string) $value);
    }

    public function class(mixed $value): Asserter\ClassAsserter
    {
        return new Asserter\ClassAsserter($this, $value);
    }

    public function dateInterval(mixed $value): Asserter\DateIntervalAsserter
    {
        return new Asserter\DateIntervalAsserter($this, $value);
    }

    public function dateTime(mixed $value): Asserter\DateTimeAsserter
    {
        return new Asserter\DateTimeAsserter($this, $value);
    }

    public function exception(mixed $value): Asserter\ExceptionAsserter
    {
        return new Asserter\ExceptionAsserter($this, $value);
    }

    public function extension(mixed $value): Asserter\ExtensionAsserter
    {
        return new Asserter\ExtensionAsserter($this, $value);
    }

    public function float($value): Asserter\FloatAsserter
    {
        return new Asserter\FloatAsserter($this, $value);
    }

    public function hash(mixed $value): Asserter\HashAsserter
    {
        return new Asserter\HashAsserter($this, $value);
    }

    public function integer(mixed $value): Asserter\IntegerAsserter
    {
        return new Asserter\IntegerAsserter($this, $value);
    }

    public function mysqlDateTime(mixed $value): Asserter\DateTimeAsserter
    {
        return new Asserter\DateTimeAsserter($this, $value);
    }

    public function object(mixed $value): Asserter\ObjectAsserter
    {
        return new Asserter\ObjectAsserter($this, $value);
    }

    public function output(mixed $value): Asserter\OutputAsserter
    {
        return new Asserter\OutputAsserter($this, $value);
    }

    public function resource(mixed $value): Asserter\ResourceAsserter
    {
        return new Asserter\ResourceAsserter($this, $value);
    }

    public function sizeOf(mixed $value): Asserter\IntegerAsserter
    {

        return new Asserter\IntegerAsserter($this, sizeof($value));
    }

    public function string(mixed $value): Asserter\StringAsserter
    {
        return new Asserter\StringAsserter($this, $value);
    }

    public function utf8String(mixed $value): Asserter\StringAsserter
    {
        return new Asserter\StringAsserter($this, $value);
    }

    public function variable(mixed $value): Asserter\VariableAsserter
    {
        return new Asserter\VariableAsserter($this, $value);
    }
}
