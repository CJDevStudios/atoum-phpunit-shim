<?php

use CJDevStudios\AtoumShim\Atoum;

// Use composer autoloader
if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
    require_once __DIR__ . '/../vendor/autoload.php';
}
class_alias(Atoum::class, 'atoum\atoum');
