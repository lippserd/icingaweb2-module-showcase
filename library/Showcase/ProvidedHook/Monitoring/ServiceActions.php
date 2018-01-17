<?php

namespace Icinga\Module\Showcase\ProvidedHook\Monitoring;

use Icinga\Module\Monitoring\Object\Service;
use Icinga\Module\Monitoring\Web\Hook\ServiceActionsHook;
use Icinga\Web\Url;

class ServiceActions extends ServiceActionsHook
{
    public function getActionsForService(Service $service)
    {
        return $this->createNavigation([
            mt('showcase', 'Showcase service action') => [
                'data-base-target' => '_next',
                'icon'             => 'home',
                'url'              => Url::fromPath(
                    'showcase/reference/service-actions-hook',
                    ['host' => $service->getHost()->getName(), 'service' => $service->getName()]
                )
            ]
        ]);
    }
}
