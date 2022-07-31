<?php

namespace CJDevStudios\AtoumShim\Asserter;

/**
 * @property resource $value
 * @method isStream()
 */
class ResourceAsserter extends AbstractAsserter
{
    protected function validateValueType(): void
    {
        $this->test::assertIsResource($this->value);
    }

    public function isOfType(?string $expected): static
    {
        $this->test::assertEqualsIgnoringCase($expected, get_resource_type($this->value));
        return $this;
    }

    public function __call(string $name, array $arguments)
    {
        // if name is like is*, the resource type is whatever is after the "is"
        // The type cannot contain spaces
        if (str_starts_with($name, 'is') && !str_contains($name, ' ')) {
            $type = substr($name, 2);
            $this->isOfType($type);
        }
    }

    public function type(): StringAsserter
    {
        return new StringAsserter($this->test, get_resource_type($this->value));
    }
}
