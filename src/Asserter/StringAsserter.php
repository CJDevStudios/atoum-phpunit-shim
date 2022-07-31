<?php

namespace CJDevStudios\AtoumShim\Asserter;

/**
 * @property string $value
 */
class StringAsserter extends VariableAsserter
{
    protected function validateValueType(): void
    {
        $this->test::assertTrue(is_string($this->value) || is_null($this->value));
    }

    public function contains($expected): static
    {
        $this->test::assertStringContainsString($expected, $this->value);
        return $this;
    }

    public function notContains($expected): static
    {
        $this->test::assertStringNotContainsString($expected, $this->value);
        return $this;
    }

    public function startWith($expected): static
    {
        $this->test::assertStringStartsWith($expected, $this->value);
        return $this;
    }

    public function notStartWith($expected): static
    {
        $this->test::assertStringStartsNotWith($expected, $this->value);
        return $this;
    }

    public function endWiths($expected): static
    {
        $this->test::assertStringEndsWith($expected, $this->value);
        return $this;
    }

    public function notEndWiths($expected): static
    {
        $this->test::assertStringEndsNotWith($expected, $this->value);
        return $this;
    }

    public function hasLength($expected): static
    {
        $this->test::assertIsInt($expected);
        $this->test::assertEquals($expected, strlen($this->value));
        return $this;
    }

    public function hasLengthGreaterThan($expected): static
    {
        $this->test::assertIsInt($expected);
        $this->test::assertGreaterThan($expected, strlen($this->value));
        return $this;
    }

    public function hasLengthLessThan($expected): static
    {
        $this->test::assertIsInt($expected);
        $this->test::assertLessThan($expected, strlen($this->value));
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

    public function isEqualToContentsOfFile($expected): static
    {
        $this->test::assertIsString($expected);
        $this->test::assertStringEqualsFile($expected, $this->value);
        return $this;
    }

    public function length(): IntegerAsserter
    {
        return new IntegerAsserter($this->test, strlen($this->value));
    }

    public function match($expected): static
    {
        $this->matches($expected);
        return $this;
    }

    public function matches($expected): static
    {
        $this->test::assertMatchesRegularExpression($expected, $this->value);
        return $this;
    }

    public function notMatches($expected): static
    {
        $this->test::assertDoesNotMatchRegularExpression($expected, $this->value);
        return $this;
    }
}
