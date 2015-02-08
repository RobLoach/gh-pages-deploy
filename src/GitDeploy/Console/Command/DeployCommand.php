<?php

namespace GitDeploy\Console\Command;

use GitDeploy\GitDeploy;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DeployCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('deploy')
            ->setDescription('Deploys the list of repositories.')
            ->addOption(
                'file',
                'f',
                InputOption::VALUE_OPTIONAL,
                'The configuration file to load.',
                'git-deploy.json'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $deploy = GitDeploy::fromFile($input->getOption('file'));
        $deploy->deploy();
    }
}
