<?php

namespace CJDevStudios\AtoumShim\Test;

use atoum\atoum;

class ResourceAsserterTest extends atoum
{
    public function testIsOfType()
    {
        $dir_stream = opendir(__DIR__);
        $this->resource($dir_stream)->isOfType('stream');
        closedir($dir_stream);
    }

    public function testType()
    {
        $dir_stream = opendir(__DIR__);
        $this->resource($dir_stream)->type()->isEqualTo('stream');
        closedir($dir_stream);
    }

    public function testIs()
    {
        $dir_stream = opendir(__DIR__);
        $this->resource($dir_stream)->isStream();
        closedir($dir_stream);
    }
}
