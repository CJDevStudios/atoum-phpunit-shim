<?php

namespace CJDevStudios\AtoumShim\Asserter;

/**
 * @property \DateInterval $value
 */
class DateIntervalAsserter extends ObjectAsserter
{
    protected function validateValueType(): void
    {
        if (is_string($this->value)) {
            $this->value = new \DateInterval($this->value);
        }
        parent::validateValueType();
        $this->test::assertInstanceOf(\DateInterval::class, $this->value);
    }

    private static function getRawDuration(\DateInterval $interval): int
    {
        $duration = 0;
        $duration += $interval->y * 365 * 24 * 60 * 60;
        $duration += $interval->m * 30 * 24 * 60 * 60;
        $duration += $interval->d * 24 * 60 * 60;
        $duration += $interval->h * 60 * 60;
        $duration += $interval->i * 60;
        $duration += $interval->s * 1000;
        $duration += $interval->f;
        return $duration;
    }

    public function isGreaterThan($expected): static
    {
        $this->test::assertInstanceOf(\DateInterval::class, $expected);
        $this->test::assertGreaterThan(self::getRawDuration($expected), self::getRawDuration($this->value));
        return $this;
    }

    public function isGreaterThanOrEqualTo($expected): static
    {
        $this->test::assertInstanceOf(\DateInterval::class, $expected);
        $this->test::assertGreaterThanOrEqual(self::getRawDuration($expected), self::getRawDuration($this->value));
        return $this;
    }

    public function isLessThan($expected): static
    {
        $this->test::assertInstanceOf(\DateInterval::class, $expected);
        $this->test::assertLessThan(self::getRawDuration($expected), self::getRawDuration($this->value));
        return $this;
    }

    public function isLessThanOrEqualTo($expected): static
    {
        $this->test::assertInstanceOf(\DateInterval::class, $expected);
        $this->test::assertLessThanOrEqual(self::getRawDuration($expected), self::getRawDuration($this->value));
        return $this;
    }

    public function isZero(): static
    {
        $this->test::assertEquals(0, self::getRawDuration($this->value));
        return $this;
    }
}
