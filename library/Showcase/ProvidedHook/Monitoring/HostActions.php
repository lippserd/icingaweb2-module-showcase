<?php

namespace Icinga\Module\Showcase\ProvidedHook\Monitoring;

use Icinga\Module\Monitoring\Web\Hook\HostActionsHook;
use Icinga\Module\Monitoring\Object\Host;
use Icinga\Web\Url;

class HostActions extends HostActionsHook
{
    public function getActionsForHost(Host $host)
    {
        return $this->createNavigation([
            mt('showcase', 'Showcase host action') => [
                'data-base-target' => '_next',
                'icon'             => 'home',
                'url'              => Url::fromPath(
                    'showcase/reference/host-actions-hook', ['host' => $host->getName()]
                )
            ]
        ]);
    }
}
