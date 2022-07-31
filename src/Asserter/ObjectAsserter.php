<?php

namespace CJDevStudios\AtoumShim\Asserter;

/**
 * @property object $value
 */
class ObjectAsserter extends VariableAsserter
{
    protected function validateValueType(): void
    {
        $this->test::assertIsObject($this->value);
    }

    public function hasSize($expected): static
    {
        $this->test::assertIsInt($expected);
        $this->test::assertCount($expected, $this->value);
        return $this;
    }

    public function isCloneOf($expected): static
    {
        // Assert the value and expected are equal but not identical
        $this->test::assertNotSame($expected, $this->value);
        $this->test::assertEquals($expected, $this->value);
        return $this;
    }

    public function isEmpty(): static
    {
        $this->test::assertEmpty($this->value);
        return $this;
    }

    public function isInstanceOf($expected): static
    {
        $this->test::assertInstanceOf($expected, $this->value);
        return $this;
    }

    public function isInstanceOfTestedClass(): static
    {
        $this->test::assertInstanceOf($this->test->getTestedInstance(), $this->value);
        return $this;
    }

    public function isNotInstanceOf($expected): static
    {
        $this->test::assertNotInstanceOf($expected, $this->value);
        return $this;
    }

    public function isTestedInstance(): static
    {
        $this->test::assertSame($this->test->getTestedInstance(), $this->value);
        return $this;
    }

    public function isNotTestedInstance(): static
    {
        $this->test::assertNotSame($this->test->getTestedInstance(), $this->value);
        return $this;
    }

    public function toString(): StringAsserter
    {
        return new StringAsserter($this->test, (string) $this->value);
    }
}
