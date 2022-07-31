<?php

namespace CJDevStudios\AtoumShim\Asserter;

class OutputAsserter extends StringAsserter
{
    protected function validateValueType(): void
    {
        // Value should be callable
        $this->test::assertIsCallable($this->value);

        // Run callable and capture the printed output (not the return value)
        ob_start();
        $v = $this->value;
        /** @var callable $v */
        $v();
        $this->value = ob_get_clean() ?? '';

        parent::validateValueType();
    }
}
