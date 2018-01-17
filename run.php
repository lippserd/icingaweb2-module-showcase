<?php

/** @var \Icinga\Application\Modules\Module $this */

// Example for auto-loading PHP vendor libs
require_once __DIR__ . '/vendor/autoload.php';

// Provide hook implementations

$this->provideHook('monitoring/HostActions');
$this->provideHook('monitoring/ServiceActions');

// Example for how to provide multiple implementations for a hook

$this->provideHook(
    'monitoring/DetailviewExtension',
    \Icinga\Module\Showcase\ProvidedHook\Monitoring\ExampleDetailViewExtension::class
);
$this->provideHook(
    'monitoring/DetailviewExtension',
    \Icinga\Module\Showcase\ProvidedHook\Monitoring\AnotherDetailViewExtension::class
);
