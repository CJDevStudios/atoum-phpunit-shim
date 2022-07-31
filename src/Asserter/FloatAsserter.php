<?php

namespace CJDevStudios\AtoumShim\Asserter;

/**
 * @property float $value
 */
class FloatAsserter extends IntegerAsserter
{
    protected function validateValueType(): void
    {
        $this->test::assertIsFloat($this->value);
    }

    public function isNearlyEqualTo($expected): static
    {
        $this->test::assertIsNumeric($expected);
        $this->test::assertEqualsWithDelta($expected, $this->value, 0.00001);
        return $this;
    }
}
