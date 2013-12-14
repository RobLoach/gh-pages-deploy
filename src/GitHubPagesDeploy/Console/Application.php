<?php

namespace GitHubPagesDeploy\Console;

use Symfony\Component\Console\Application as BaseApplication;
use GitHubPagesDeploy\Console\Command\DeployCommand;

class Application extends BaseApplication
{
    const NAME = 'GitHub Pages Deploy';
    const VERSION = '@package_version@';

    public function __construct()
    {
        parent::__construct(static::NAME, static::VERSION);
    }

    protected function getDefaultCommands()
    {
        $defaultCommands = parent::getDefaultCommands();
        $defaultCommands[] = new DeployCommand();
        return $defaultCommands;
    }
}
