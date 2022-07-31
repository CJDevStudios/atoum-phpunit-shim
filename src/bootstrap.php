<?php

use CJDevStudios\AtoumShim\Atoum;

// Use composer autoloader
require_once __DIR__ . '/../vendor/autoload.php';
class_alias(Atoum::class, 'atoum\atoum');
