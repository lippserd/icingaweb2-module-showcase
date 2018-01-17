<?php

namespace Icinga\Module\Showcase\Controllers;

use Icinga\Web\Controller;

/**
 * Entry point for requests to showcase and showcase/index
 */
class IndexController extends Controller
{
    /**
     * Serve showcase and showcase/index/index
     */
    public function indexAction()
    {
        $this->getTabs()->add('showcase.index.index', [
            'active' => true,
            'label'  => $this->translate('Welcome'),
            'url'    => $this->getRequest()->getUrl()
        ]);

        $this->view->greeting = <<<'EOD'
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis auctor sem in commodo imperdiet. Cras sollicitudin,
dolor non ornare faucibus, tortor purus interdum tellus, vitae condimentum mi enim venenatis dui. Proin ullamcorper
metus vel faucibus porta. Donec lacus nibh, tempor aliquam interdum vitae, molestie sed dolor. Cras odio tortor,
mollis et volutpat sagittis, dignissim id eros. Proin eu ornare quam, viverra facilisis leo. Cras ullamcorper at nisl
et interdum. Donec id erat volutpat, convallis justo eget, dapibus tortor. Phasellus leo lectus, consequat at ultrices
id, varius sed nulla. Phasellus ultricies egestas consequat. Duis rhoncus iaculis nulla eget consequat. Nullam sit amet
justo orci. Donec mauris elit, vulputate at mi quis, rutrum fermentum nisi. Vivamus sit amet ex nec metus pharetra
commodo.
EOD;
    }
}
