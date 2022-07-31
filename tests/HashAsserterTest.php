<?php

namespace CJDevStudios\AtoumShim\Test;

use atoum\atoum;

class HashAsserterTest extends atoum
{

    public function testIsMd5()
    {
        $this->hash(md5('test'))->isMd5();
    }

    public function testIsSha1()
    {
        $this->hash(sha1('test'))->isSha1();
    }

    public function testIsSha512()
    {
        $this->hash(hash('sha512', 'test'))->isSha512();
    }

    public function testIsSha256()
    {
        $this->hash(hash('sha256', 'test'))->isSha256();
    }
}
