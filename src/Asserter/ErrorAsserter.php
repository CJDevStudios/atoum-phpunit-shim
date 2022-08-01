<?php

namespace CJDevStudios\AtoumShim\Asserter;

use Error;
use ErrorException;

/**
 * @property ErrorException|Error|null $value
 */
class ErrorAsserter extends AbstractAsserter
{
    protected function validateValueType(): void
    {
        // The value should be an instance of Error or a closure that triggers an Error.
        $v = $this->value;
        $is_callable = is_callable($v);
        $caught = null;
        if ($is_callable) {
            try {
                /** @var callable $v */
                // Set error handler
                set_error_handler(static function($errno, $errstr, $errfile, $errline) {
                    throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
                });
                $v();
            } catch (ErrorException $e) {
                $caught = $e;
            } finally {
                // Restore error handler
                restore_error_handler();
            }
            $this->value = $caught;
        }
        // Assert value is an Error, ErrorException or null
        $this->test::assertTrue(
            $this->value instanceof ErrorException ||
            $this->value instanceof Error ||
            $this->value === null
        );
    }

    public function exists(): static
    {
        $this->test::assertNotNull($this->value);
        return $this;
    }

    public function notExists(): void
    {
        $this->test::assertNull($this->value);
    }

    public function withType(int $expected): static
    {
        $this->exists();
        if (method_exists($this->value, 'getSeverity')) {
            $this->test::assertSame($expected, $this->value->getSeverity());
        } else {
            $this->test::assertSame($expected, $this->value->getCode());
        }
        return $this;
    }

    public function withAnyType(): static
    {
        $this->exists();
        // This is just syntactic sugar
        return $this;
    }

    public function withMessage($expected): static
    {
        $this->exists();
        $this->test::assertSame($expected, $this->value->getMessage());
        return $this;
    }

    public function withAnyMessage(): static
    {
        $this->exists();
        // This is just syntactic sugar
        return $this;
    }

    public function withPattern($expected): static
    {
        $this->exists();
        $this->test::assertMatchesRegularExpression($expected, $this->value->getMessage());
        return $this;
    }
}
