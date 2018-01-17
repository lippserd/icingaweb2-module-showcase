<?php

// Namespace for modules is always Icinga\Module\$module\Controllers;
namespace Icinga\Module\Showcase\Controllers;

use Icinga\Module\Showcase\Forms\ShowcaseConfigForm;
use Icinga\Util\StringHelper;
use Icinga\Web\Controller; /* Base class for controllers */

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

    /**
     * Serve showcase/reference/config. Handle the module configuration. Has to be registered as config tab in the
     * configuration.php
     */
    public function configAction()
    {
        $this->getTabs()->add('showcase.reference.config', [
            'active' => true,
            'label'  => $this->translate('Config'),
            'url'    => $this->getRequest()->getUrl()
        ]);

        $form = new ShowcaseConfigForm();
        $form->setIniConfig($this->Config());
        // $this->Config() is bound to /etc/icingaweb2/modules/showcase/config.ini by default
        $form->handleRequest();

        $this->view->form = $form;
    }

    /**
     * Serve showcase/reference/search. Show search results in Icinga Web 2's search dashboard. Has to be registered
     * as search URL in the configuration.php
     */
    public function searchAction()
    {
        $this->getTabs()->add('showcase.reference.search', [
            'active' => true,
            'label'  => $this->translate('Search'),
            'url'    => $this->getRequest()->getUrl()
        ]);

        $this->view->query = $this->params->getRequired('q');
    }

    /**
     * Serve showcase/reference/restricted. Example for permission and restriction usage
     */
    public function restrictedAction()
    {
        // Exit if user does not have the following permission granted
        $this->assertPermission('showcase/restricted');

        // Or write your own logic if you want to enhance the view or allow more functions based on permissions
        if ($this->hasPermission('showcase/restricted')) {
            // Permitted
        } else {
            // Denied
        }

        $this->getTabs()->add('showcase.reference.restricted', [
            'active' => true,
            'label'  => $this->translate('Restricted'),
            'url'    => $this->getRequest()->getUrl()
        ]);

        // Handle restrictions. Since roles define restrictions and users may have more than one role we receive an
        // array of restrictions here
        $rawRestrictions = $this->getRestrictions('showcase/restricted/filter');

        $restrictions = [];

        // The implementation decides how to handle restrictions. We expect comma separated strings here
        foreach ($rawRestrictions as $rawRestriction) {
            $restrictions = array_merge($restrictions, StringHelper::trimSplit($rawRestriction));
        }

        // Do something based on the restrictions. We just show them in the view
        $this->view->restrictions = $restrictions;
    }
}
