<?php

// Namespace for CLI commands is always Icinga\Module\$module\Clicommands;
namespace Icinga\Module\Showcase\Clicommands;

use Icinga\Cli\Command; /* Base class for CLI commands */

class SayCommand extends Command
{
    /**
     * Just say something
     *
     * Usage: icingacli say something <what> [options]
     *
     * Options:
     *
     * --shout  Whether or not to shout
     */
    public function somethingAction()
    {
        $what = $this->params->shift();
        if ($what === 'nice') {
            $out = "What a great audience we have today\n";
        } else {
            $out = "Something\n";
        }

        $shout = $this->params->get('shout', false);
        if ($shout) {
            $out = strtoupper($out);
        }

        echo $out;
    }
}
