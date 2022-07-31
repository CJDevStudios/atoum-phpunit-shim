<?php

namespace CJDevStudios\AtoumShim\Asserter;

/**
 * @property \DateTime $value
 */
class DateTimeAsserter extends ObjectAsserter
{
    protected function validateValueType(): void
    {
        if (is_string($this->value)) {
            $this->value = new \DateTime($this->value);
        }
        parent::validateValueType();
        $this->test::assertInstanceOf(\DateTimeInterface::class, $this->value);
    }

    public function hasYear($year): static
    {
        $this->test::assertEquals($year, $this->value->format('Y'));
        return $this;
    }

    public function hasMonth($month): static
    {
        $this->test::assertEquals($month, $this->value->format('m'));
        return $this;
    }

    public function hasDay($day): static
    {
        $this->test::assertEquals($day, $this->value->format('d'));
        return $this;
    }

    public function hasHour($hour): static
    {
        $this->test::assertEquals($hour, $this->value->format('H'));
        return $this;
    }

    public function hasMinutes($minute): static
    {
        $this->test::assertEquals($minute, $this->value->format('i'));
        return $this;
    }

    public function hasSeconds($second): static
    {
        $this->test::assertEquals($second, $this->value->format('s'));
        return $this;
    }

    public function hasDate($year = null, $month = null, $day = null): static
    {
        if ($year !== null) {
            $this->hasYear($year);
        }
        if ($month !== null) {
            $this->hasMonth($month);
        }
        if ($day !== null) {
            $this->hasDay($day);
        }
        return $this;
    }

    public function hasTime($hour = null, $minute = null, $second = null): static
    {
        if ($hour !== null) {
            $this->hasHour($hour);
        }
        if ($minute !== null) {
            $this->hasMinutes($minute);
        }
        if ($second !== null) {
            $this->hasSeconds($second);
        }
        return $this;
    }

    public function hasDateAndTime($year = null, $month = null, $day = null, $hour = null, $minute = null, $second = null): static
    {
        $this->hasDate($year, $month, $day);
        $this->hasTime($hour, $minute, $second);
        return $this;
    }

    public function hasTimezone($timezone): static
    {
        $this->test::assertEquals($timezone, $this->value->format('e'));
        return $this;
    }

    public function isImmutable(): static
    {
        $this->test::assertInstanceOf(\DateTimeImmutable::class, $this->value);
        return $this;
    }
}
