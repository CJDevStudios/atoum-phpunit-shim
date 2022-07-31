<?php

namespace CJDevStudios\AtoumShim\Asserter;

/**
 * @property int $value
 */
class IntegerAsserter extends VariableAsserter
{
    protected function validateValueType(): void
    {
        $this->test::assertIsInt($this->value);
    }

    public function isGreaterThan($expected): static
    {
        $this->test::assertGreaterThan($expected, $this->value);
        return $this;
    }

    public function isLessThan($expected): static
    {
        $this->test::assertLessThan($expected, $this->value);
        return $this;
    }

    public function isGreaterThanOrEqualTo($expected): static
    {
        $this->test::assertGreaterThanOrEqual($expected, $this->value);
        return $this;
    }

    public function isLessThanOrEqualTo($expected): static
    {
        $this->test::assertLessThanOrEqual($expected, $this->value);
        return $this;
    }

    public function isZero(): static
    {
        $this->test::assertEquals(0, $this->value);
        return $this;
    }
}
