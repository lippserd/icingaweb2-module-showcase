<?php

// Namespace for forms is always Icinga\Module\$module\Forms;
namespace Icinga\Module\Showcase\Forms;

use Icinga\Data\ResourceFactory;
use Icinga\Forms\ConfigForm;

class ShowcaseConfigForm extends ConfigForm
{
    public function init()
    {
        $this->setTitle($this->translate('Showcase Module Config'));
    }

    public function createElements(array $formData)
    {
        $dbResources = ResourceFactory::getResourceConfigs('db')->keys();

        $this->addElement(
            'select',
            'general_resource', // Scheme is $section_$key
            [
                'required'     => true,
                'description'  => $this->translate('Resource for monitoring database access'),
                'label'        => $this->translate('Resource'),
                'multiOptions' => array_combine($dbResources, $dbResources)
            ]
        );

        $this->setSubmitLabel($this->translate('Save Config'));
    }
}
