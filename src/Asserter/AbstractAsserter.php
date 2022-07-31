<?php

namespace CJDevStudios\AtoumShim\Asserter;

use CJDevStudios\AtoumShim\Atoum;

abstract class AbstractAsserter
{

    protected Atoum $test;

    protected $value;

    public function __construct(Atoum $test, $value)
    {
        $this->test = $test;
        $this->value = $value;
        $this->validateValueType();
    }

    abstract protected function validateValueType(): void;
}
