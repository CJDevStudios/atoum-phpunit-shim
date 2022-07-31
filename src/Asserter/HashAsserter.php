<?php

namespace CJDevStudios\AtoumShim\Asserter;

class HashAsserter extends StringAsserter
{
    public function isMd5(): self
    {
        $this->test::assertMatchesRegularExpression('/^[a-f0-9]{32}$/', $this->value);
        return $this;
    }

    public function isSha1(): self
    {
        $this->test::assertMatchesRegularExpression('/^[a-f0-9]{40}$/', $this->value);
        return $this;
    }

    public function isSha256(): self
    {
        $this->test::assertMatchesRegularExpression('/^[a-f0-9]{64}$/', $this->value);
        return $this;
    }

    public function isSha512(): self
    {
        $this->test::assertMatchesRegularExpression('/^[a-f0-9]{128}$/', $this->value);
        return $this;
    }
}
