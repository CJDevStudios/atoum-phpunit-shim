<?php

namespace CJDevStudios\AtoumShim\Asserter;

use CJDevStudios\AtoumShim\Atoum;

/**
 * @property array|\ArrayAccess $value
 */
class ArrayAsserter extends VariableAsserter
{
    public $child;

    public function __construct(Atoum $test, $value)
    {
        parent::__construct($test, $value);
        $this->child = new class($test, $value) implements \ArrayAccess {

            public function __construct(
                private Atoum $test,
                private $value
            )
            {}

            public function offsetExists(mixed $offset)
            {
                return isset($this->value[$offset]);
            }

            public function offsetGet(mixed $offset)
            {
                return new ArrayAsserter($this->test, $this->value[$offset]);
            }

            public function offsetSet(mixed $offset, mixed $value)
            {
                // Not supported
            }

            public function offsetUnset(mixed $offset)
            {
                // Not supported
            }
        };
    }

    public function __invoke()
    {
        // Get the callable that was passed in
        $callable = func_get_arg(0);
        if (is_callable($callable)) {
            // Call the callable with this
            $callable($this);
        }
    }

    protected function validateValueType(): void
    {
        $this->test::assertIsArray($this->value);
    }

    public function contains($expected): static
    {
        $this->test::assertContainsEquals($expected, $this->value);
        return $this;
    }

    public function notContains($expected): static
    {
        $this->test::assertNotContainsEquals($expected, $this->value);
        return $this;
    }

    public function strictContains($expected): static
    {
        $this->test::assertContains($expected, $this->value, true);
        return $this;
    }

    public function strictlyNotContains($expected): static
    {
        $this->test::assertNotContains($expected, $this->value, true);
        return $this;
    }

    public function containsValues($expected): static
    {
        $this->test::assertIsArray($expected);
        foreach ($expected as $expected_value) {
            $this->contains($expected_value);
        }
        return $this;
    }

    public function notContainsValues($expected): static
    {
        $this->test::assertIsArray($expected);
        foreach ($expected as $expected_value) {
            $this->notContains($expected_value);
        }
        return $this;
    }

    public function strictlyContainsValues($expected): static
    {
        $this->test::assertIsArray($expected);
        foreach ($expected as $expected_value) {
            $this->strictContains($expected_value);
        }
        return $this;
    }

    public function strictlyNotContainsValues($expected): static
    {
        $this->test::assertIsArray($expected);
        foreach ($expected as $expected_value) {
            $this->strictlyNotContains($expected_value);
        }
        return $this;
    }

    public function hasKey($expected): static
    {
        // Atoum did not check key type
        $this->keys()->contains($expected);
        return $this;
    }

    public function notHasKey($expected): static
    {
        // Atoum did not check key type
        $this->keys()->notContains($expected);
        return $this;
    }

    public function hasKeys($expected): static
    {
        // Atoum did not check key type
        $this->keys()->containsValues($expected);
        return $this;
    }

    public function notHasKeys($expected): static
    {
        // Atoum did not check key type
        $this->keys()->notContainsValues($expected);
        return $this;
    }

    public function hasSize($expected): static
    {
        $this->test::assertIsInt($expected);
        $this->test::assertCount($expected, $this->value);
        return $this;
    }

    public function isEmpty(): static
    {
        $this->test::assertEmpty($this->value);
        return $this;
    }

    public function isNotEmpty(): static
    {
        $this->test::assertNotEmpty($this->value);
        return $this;
    }

    public function keys(): ArrayAsserter
    {
        return new ArrayAsserter($this->test, array_keys($this->value));
    }

    public function values(): ArrayAsserter
    {
        return new ArrayAsserter($this->test, array_values($this->value));
    }

    public function size(): IntegerAsserter
    {
        return new IntegerAsserter($this->test, count($this->value));
    }
}
