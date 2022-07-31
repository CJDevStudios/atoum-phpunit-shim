<?php

namespace CJDevStudios\AtoumShim\Test;

use atoum\atoum;

class ExtensionAsserterTest extends atoum
{
    public function testIsLoaded()
    {
        $common_extensions = ['json', 'curl'];
        $was_tested = false;
        foreach ($common_extensions as $extension) {
            // Cannot use assertion directly because some PHP environments may be missing the extensions
            // Even though "json" is included, it may be missing if PHP was compiled with --disable-all
            if (extension_loaded($extension)) {
                $this->extension($extension)->isLoaded();
                $was_tested = true;
            }
        }
        if (!$was_tested) {
            $this->fail('No common extension was available to test');
        }
    }
}
