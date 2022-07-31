<?php

namespace CJDevStudios\AtoumShim\Test;

use atoum\atoum;

class ArrayAsserterTest extends atoum
{

    public function testChild()
    {
        $this->array([
            'child1' => [
                'key1' => 'value1',
                'key2' => 'value2',
                'child1A' => []
            ]
        ])->child['child1'](static function ($child) {
            $child
                ->hasSize(3)
                ->hasKeys(['key1', 'key2', 'child1A'])
                ->contains('value1')
                ->child['child1A'](static function ($child) {
                    $child->isEmpty();
                });
        });
    }

    public function testNotContainsValues()
    {
        $this->array([1, 2, 3])
            ->notContainsValues([4, 5, 6]);
    }

    public function testNotContains()
    {
        $this->array([1, 2, 3])
            ->notContains(4);
        $this->array([1, 2, 3])
            ->strictlyNotContains(['2', 4]);
    }

    public function testStrictContains()
    {
        $this->array([1, '2', 3])
            ->strictContains('2');
    }

    public function testHasKeys()
    {
        $this->array([1, 2, 3])
            ->hasKeys([0, 1, 2]);
        $this->array([
            'a' => 1,
            'b' => 2,
            'c' => 3,
        ])->hasKeys(['a', 'b', 'c']);
    }

    public function testHasKey()
    {
        $this->array([1, 2, 3])
            ->hasKey(0);
        $this->array([
            'a' => 1,
            'b' => 2,
            'c' => 3,
        ])->hasKey('a');
    }

    public function testValues()
    {
        $this->array([1, 2, 3])
            ->values()
            ->contains(1)
            ->contains(2)
            ->contains(3);
        $this->array([
            'a' => 1,
            'b' => 2,
            'c' => 3,
        ])->values()
            ->contains(1)
            ->contains(2)
            ->contains(3);
    }

    public function testNotHasKey()
    {
        $this->array([1, 2, 3])
            ->notHasKey(4);
        $this->array([
            'a' => 1,
            'b' => 2,
            'c' => 3,
        ])->notHasKey('d');
    }

    public function testSize()
    {
        $this->array([1, 2, 3])
            ->hasSize(3);
        $this->array([
            'a' => 1,
            'b' => 2
        ])->hasSize(2);
    }

    public function testStrictlyContainsValues()
    {
        $this->array([1, 2, 3])
            ->strictlyContainsValues([1, 2, 3]);
        $this->array([
            'a' => 1,
            'b' => 2,
            'c' => '3',
        ])->strictlyContainsValues([1, 2, '3']);
    }

    public function testHasSize()
    {
        $this->array([1, 2, 3])
            ->hasSize(3);
        $this->array([
            'a' => 1,
            'b' => 2
        ])->hasSize(2);
    }

    public function testKeys()
    {
        $this->array([1, 2, 3])
            ->keys()
            ->contains(0)
            ->contains(1)
            ->contains(2);
        $this->array([
            'a' => 1,
            'b' => 2,
            'c' => 3,
        ])->keys()
            ->contains('a')
            ->contains('b')
            ->contains('c');
    }

    public function testNotHasKeys()
    {
        $this->array([1, 2, 3])
            ->notHasKeys([4, 5, 6]);
        $this->array([
            'a' => 1,
            'b' => 2,
            'c' => 3,
        ])->notHasKeys(['d', 'e', 'f']);
    }

    public function testStrictlyNotContains()
    {
        $this->array([1, 2, 3])
            ->strictlyNotContains(4);
        $this->array([
            'a' => 1,
            'b' => 2,
            'c' => '3',
        ])->strictlyNotContains(3);
    }

    public function testStrictlyNotContainsValues()
    {
        $this->array([1, 2, 3])
            ->strictlyNotContainsValues([4, 5, 6]);
        $this->array([
            'a' => 1,
            'b' => 2,
            'c' => '3',
        ])->strictlyNotContainsValues(['1', '2', 3]);
    }

    public function testContains()
    {
        $this->array([1, 2, 3])
            ->contains(1);
        $this->array([
            'a' => 1,
            'b' => 2,
            'c' => 3,
        ])->contains(3);
    }

    public function testIsNotEmpty()
    {
        $this->array([1, 2, 3])
            ->isNotEmpty();
        $this->array([
            'a' => 1,
            'b' => 2,
            'c' => 3,
        ])->isNotEmpty();
    }

    public function testContainsValues()
    {
        $this->array([1, 2, 3])
            ->containsValues([1, 2, 3]);
        $this->array([
            'a' => 1,
            'b' => 2,
            'c' => '3',
        ])->containsValues([1, 2, '3']);
    }

    public function testIsEmpty()
    {
        $this->array([])
            ->isEmpty();
    }
}
