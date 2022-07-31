<?php

namespace CJDevStudios\AtoumShim\Asserter;

/**
 * @property \Exception $value
 * @property StringAsserter $message
 */
class ExceptionAsserter extends ObjectAsserter
{
    protected function validateValueType(): void
    {
        // The value should be an instance of Exception or a closure that throws an Exception.
        $v = $this->value;
        $is_callable = is_callable($v);
        $caught = null;
        if ($is_callable) {
            try {
                /** @var callable $v */
                $v();
            } catch (\Exception $e) {
                $caught = $e;
            }
            if ($caught === null) {
                $this->test::fail('The function did not throw an exception.');
            }
            $this->value = $caught;
        }
        $this->test::assertInstanceOf(\Exception::class, $this->value);
    }

    public function hasCode($expected): static
    {
        $this->test::assertSame($expected, $this->value->getCode());
        return $this;
    }

    public function hasDefaultCode(): static
    {
        $this->test::assertSame(0, $this->value->getCode());
        return $this;
    }

    public function hasMessage($expected): static
    {
        $this->test::assertSame($expected, $this->value->getMessage());
        return $this;
    }

    public function hasNestedException($expected = null): static
    {
        // Check the exception has a reference to another exception.
        $this->test::assertInstanceOf(\Exception::class, $this->value->getPrevious());
        // Check type of the reference if provided.
        if ($expected !== null) {
            $this->test::assertInstanceOf($expected, $this->value->getPrevious());
        }
        return $this;
    }

    public function __get(string $name)
    {
        if ($name === 'message') {
            return new StringAsserter($this->test, $this->value->getMessage());
        }
        return null;
    }

    public function __set(string $name, $value): void
    {
    }

    public function __isset(string $name): bool
    {
        return $name === 'message';
    }
}
