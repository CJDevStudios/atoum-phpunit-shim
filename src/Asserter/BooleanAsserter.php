<?php

namespace CJDevStudios\AtoumShim\Asserter;

/**
 * @property bool $value
 */
class BooleanAsserter extends VariableAsserter
{
    protected function validateValueType(): void
    {
        $this->test::assertIsBool($this->value);
    }

    public function isTrue(): static
    {
        $this->test::assertTrue($this->value);
        return $this;
    }

    public function isFalse(): static
    {
        $this->test::assertFalse($this->value);
        return $this;
    }
}
