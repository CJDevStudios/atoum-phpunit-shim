<?php

namespace CJDevStudios\AtoumShim\Asserter;

class VariableAsserter extends AbstractAsserter
{
    protected function validateValueType(): void
    {
        // No validation needed
        return;
    }

    public function isCallable(): static
    {
        $this->test::assertIsCallable($this->value);
        return $this;
    }

    public function isNotCallable(): static
    {
        $this->test::assertIsNotCallable($this->value);
        return $this;
    }

    public function isEqualTo($expected): static
    {
        $this->test::assertEquals($expected, $this->value);
        return $this;
    }

    public function isNotEqualTo($expected): static
    {
        $this->test::assertNotEquals($expected, $this->value);
        return $this;
    }

    public function isIdenticalTo($expected): static
    {
        $this->test::assertSame($expected, $this->value);
        return $this;
    }

    public function isNotIdenticalTo($expected): static
    {
        $this->test::assertNotSame($expected, $this->value);
        return $this;
    }

    public function isNull(): static
    {
        $this->test::assertNull($this->value);
        return $this;
    }

    public function isNotNull(): static
    {
        $this->test::assertNotNull($this->value);
        return $this;
    }

    public function isNotTrue(): static
    {
        $this->test::assertNotTrue($this->value);
        return $this;
    }

    public function isNotFalse(): static
    {
        $this->test::assertNotFalse($this->value);
        return $this;
    }
}
