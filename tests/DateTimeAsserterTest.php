<?php

namespace CJDevStudios\AtoumShim\Test;

use atoum\atoum;

class DateTimeAsserterTest extends atoum
{

    public function testHasDateAndTime()
    {
        $test_date = new \DateTime('2020-01-02 10:20:30');
        $this->dateTime($test_date)
            ->hasDateAndTime()
            ->hasDateAndTime('2020')
            ->hasDateAndTime('2020', '01')
            ->hasDateAndTime('2020', '01', '02')
            ->hasDateAndTime('2020', '01', '02', '10')
            ->hasDateAndTime('2020', '01', '02', '10', '20')
            ->hasDateAndTime('2020', '01', '02', '10', '20', '30');
    }

    public function testHasDay()
    {
        $test_date = new \DateTime('2020-01-02 10:20:30');
        $this->dateTime($test_date)
            ->hasDay('02');
    }

    public function testHasMonth()
    {
        $test_date = new \DateTime('2020-01-02 10:20:30');
        $this->dateTime($test_date)
            ->hasMonth('01');
    }

    public function testHasMinutes()
    {
        $test_date = new \DateTime('2020-01-02 10:20:30');
        $this->dateTime($test_date)
            ->hasMinutes('20');
    }

    public function testHasHour()
    {
        $test_date = new \DateTime('2020-01-02 10:20:30');
        $this->dateTime($test_date)
            ->hasHour('10');
    }

    public function testHasSeconds()
    {
        $test_date = new \DateTime('2020-01-02 10:20:30');
        $this->dateTime($test_date)
            ->hasSeconds('30');
    }

    public function testHasDate()
    {
        $test_date = new \DateTime('2020-01-02 10:20:30');
        $this->dateTime($test_date)
            ->hasDate('2020', '01', '02');
    }

    public function testHasYear()
    {
        $test_date = new \DateTime('2020-01-02 10:20:30');
        $this->dateTime($test_date)
            ->hasYear('2020');
    }

    public function testHasTime()
    {
        $test_date = new \DateTime('2020-01-02 10:20:30');
        $this->dateTime($test_date)
            ->hasTime('10', '20', '30');
    }

    public function testHasTimezone()
    {
        $this->dateTime(new \DateTime('2020-01-02 10:20:30'))
            ->hasTimezone('UTC');
        $this->dateTime(new \DateTime('2020-01-02 10:20:30', new \DateTimeZone('Europe/Paris')))
            ->hasTimezone('Europe/Paris');
    }

    public function testIsImmutable()
    {
        $test_date = new \DateTimeImmutable('2020-01-02 10:20:30');
        $this->dateTime($test_date)
            ->isImmutable();
    }
}
