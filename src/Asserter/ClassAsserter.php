<?php

namespace CJDevStudios\AtoumShim\Asserter;

/**
 * @property string $value
 */
class ClassAsserter extends AbstractAsserter
{

    public function validateValueType(): void
    {
        $this->test::assertIsString($this->value);
        $this->test::assertTrue(class_exists($this->value));
    }

    public function hasConstant($expected): static
    {
        $this->test::assertIsString($expected);
        $this->test::assertTrue(defined($this->value . '::' . $expected));
        return $this;
    }

    public function hasInterface($expected): static
    {
        $this->test::assertIsString($expected);
        $this->test::assertTrue(interface_exists($expected));

        //Use reflection to check if the class implements the interface to avoid having to instantiate the class
        $rc = new \ReflectionClass($this->value);
        $this->test::assertTrue($rc->implementsInterface($expected));
        return $this;
    }

    public function hasMethod($expected): static
    {
        $this->test::assertIsString($expected);
        $this->test::assertTrue(method_exists($this->value, $expected));
        return $this;
    }

    public function hasParent($expected): static
    {
        $this->test::assertIsString($expected);
        $this->test::assertTrue(is_subclass_of($this->value, $expected));
        return $this;
    }

    public function hasNoParent(): static
    {
        $this->test::assertFalse(get_parent_class($this->value));
        return $this;
    }

    public function isAbstract(): static
    {
        $rc = new \ReflectionClass($this->value);
        $this->test::assertTrue($rc->isAbstract());
        return $this;
    }

    public function isFinal(): static
    {
        $rc = new \ReflectionClass($this->value);
        $this->test::assertTrue($rc->isFinal());
        return $this;
    }

    public function isSubclassOf($expected): static
    {
        $this->test::assertIsString($expected);
        $this->test::assertTrue(is_subclass_of($this->value, $expected));
        return $this;
    }
}
