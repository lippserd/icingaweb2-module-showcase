<?php

namespace Icinga\Module\Showcase\ProvidedHook\Monitoring;

use Icinga\Module\Monitoring\Hook\DetailviewExtensionHook;
use Icinga\Module\Monitoring\Object\MonitoredObject;
use Icinga\Module\Monitoring\Object\Service;

class ExampleDetailViewExtension extends DetailviewExtensionHook
{
    public function getHtmlForObject(MonitoredObject $object)
    {
        if ($object instanceof Service) {
            // It's a service
        } else {
            // It's a host
        }

        $objectName = $this->getView()->escape($object->getName());

        return <<<EOT
<div>
    <h2>This is an example extension for $objectName</h2>
    <p>Some content</p>
</div>
EOT;
    }

}
