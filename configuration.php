<?php

/** @var \Icinga\Application\Modules\Module $this */

/*
 * First, we'll create the menu entries for our module. With the function menuSection() you'll add top-level entries
 * which are then further extended with sub-level entries. Note that at the moment Icinga Web 2 only supports one level
 * of sub entries. The first parameter to the menuSection is the entry's label followed by an array of configuration
 * options. Those options are:
 *
 *   icon - Which icon to display for the menu entry
 *   priority - Where to display the menu entry
 *   permission - This permission must be granted to the user in order to view the menu entry
 *
 * Note that it is best practice to wrap the label in a function call to N_. This ensures that the label is recognized
 * by our translation module but is not immediately translated.
 */

$section = $this->menuSection(N_('Showcase'), [
    'icon'      => 'home',
    'priority'  => 20 // Show menu entry after the dashboard
]);
$section->add(N_('Welcome'), [
    'url'      => 'showcase', // This URL dispatches to showcase/index/index
    'priority' => 10
]);
$section->add(N_('Index'), [
    'url'      => 'showcase/reference', // This URL dispatches to showcase/reference/index
    'priority' => 20
]);
$section->add(N_('Example'), [
    'url'      => 'showcase/reference/example',
    'priority' => 30
]);
$section->add(N_('Problems'), [
    'url'      => 'showcase/reference/problems',
    'priority' => 40
]);
$section->add(N_('Restricted'), [
    'url'        => 'showcase/reference/restricted', // This URL dispatches to showcase/restricted/index
    'priority'   => 50,
    'permission' => 'showcase/restricted' // This permission is required in order to view the menu entry
]);

/*
 * Now we'll create a new dashboard for our module and extend the Current Incidents dashboard from the monitoring
 * module.
 */

$dashboard = $this->dashboard(N_('Locations'));
$dashboard->add(N_('Welcome'), 'showcase'); // Dispatches to showcase/index/index

// This will extend the Current Incidents dashboard from the monitoring module or just create it
$currentIncidents = $this->dashboard(N_('Current Incidents'));
$currentIncidents->add(N_('Showcase Problems'), 'showcase/reference/problems');

/*
 * Icinga Web 2 provides a search where modules have the possibility to automatically include module specific search
 * results. The search query is appended as parameter with the name q to the URL you specify.
 */

$this->provideSearchUrl($this->translate('Showcase'), 'showcase/reference/search');

/*
 * Next step is to provide the configuration tab(s) for the module which are displayed in the module's detail area.
 * This area is accessible via Configuration -> Modules -> $module
 */

$this->provideConfigTab('showcase.config', [
    'label' => $this->translate('Showcase Config'),
    'title' => $this->translate('Configure the showcase module'),
    'url'   => 'reference/config' // Dispatches to showcase/reference/config

    /*
     * Note that we always specified the module name as entry point for our URLs in the previous configuration. Don't
     * specify the module name here because it is automatically added. This is not consistent and considered a bug
     * in Web 2.
     */
]);

/*
 * For security Icinga Web 2 provides permissions and restrictions. Permissions are used to grant users access to
 * restricted areas and restrictions are used to limit information in those areas to a specific subset.
 * Using restrictions is a module's implementation detail, so you can do whatever you like. In most cases it makes
 * sense to combine permissions and restrictions but you can use them independently. The permissions and restrictions
 * you provide will be automatically added to the role configuration. You just have to make use of them in your code.
 */

$this->providePermission(
    'showcase/restricted',
    $this->translate('Permit access to the restricted showcase area')
);

$this->provideRestriction(
    'showcase/restricted/filter',
    $this->translate('Comma-separated list of topics which are allowed to access in the restricted showcase area')
);

/*
 * The default CSS/Less and JavaScript files for modules are public/css/module.less and public/js/module.js.
 * It is possible to provide other files with the following functions.
 */

// Provide CSS file. Path is relative to public/css.
$this->provideCssFile('vendor/vendor-stylesheet.css');

// Provide JS file. Path is relative to public/js.
$this->provideJsFile('vendor/vendor-javascript.js');

