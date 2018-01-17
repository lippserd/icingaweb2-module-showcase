<?php

/** @var \Icinga\Application\Modules\Module $this */

// Example for auto-loading PHP vendor libs
require_once __DIR__ . '/vendor/autoload.php';

// Provide hook implementations
$this->provideHook('monitoring/HostActions');
$this->provideHook('monitoring/ServiceActions');
