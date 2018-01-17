<?php

// Namespace for modules is always Icinga\Module\$module\Controllers;
namespace Icinga\Module\Showcase\Controllers;

// Base class for controllers
use Icinga\Web\Controller;

/*
 * By default, all URLs in Icinga Web 2 are composed using the scheme module/controller/action.
 *
 * If you don't specify an action in the URL, the request will be routed to module/controller/index. If your controller
 * provides the indexAction, the request will be served.
 *
 * If you just specify the module in the URL, the request will be routed to module/index/index. In order to  serve this
 * requests, you have to create the IndexController with the indexAction.
 *
 * View scripts for controller actions have to placed beneath the directory application/views/scripts. You have to
 * create one directory per controller there and one view script per action beneath the controller directory:
 *
 *   application/views/scripts/
 *     reference/
 *       example.phtml
 *       index.phtml
 */

/**
 * Entry point for requests to showcase/reference
 */
class ReferenceController extends Controller
{
    /**
     * Serve showcase and showcase/reference/example
     */
    public function exampleAction()
    {
        $this->getTabs()->add('showcase.reference.example', [
            'active' => true,
            'label'  => $this->translate('Example'),
            'url'    => $this->getRequest()->getUrl()
        ]);

        // Enable auto-refresh. Refresh every 10 seconds
        $this->setAutorefreshInterval(10);
    }

    /**
     * Serve showcase/reference and showcase/reference/index
     */
    public function indexAction()
    {
        $this->getTabs()->add('showcase.reference.index', [
            'active' => true,
            'label'  => $this->translate('Index'),
            'url'    => $this->getRequest()->getUrl()
        ]);
    }
}
