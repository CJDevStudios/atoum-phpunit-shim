<?php

namespace CJDevStudios\AtoumShim\Asserter;

/**
 * @property string $value
 */
class ExtensionAsserter extends AbstractAsserter
{
    protected function validateValueType(): void
    {
        $this->test::assertIsString($this->value);
    }

    public function isLoaded(): static
    {
        $this->test::assertTrue(extension_loaded($this->value));
        return $this;
    }
}
