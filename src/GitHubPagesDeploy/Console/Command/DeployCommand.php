<?php

namespace GitHubPagesDeploy\Console\Command;

use GitHubPagesDeploy\GitHubPagesDeploy;
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
            ->setDescription('Deploys the list of GitHub Pages repositories.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $deploy = GitHubPagesDeploy::fromFile();
        $repositories = $deploy->getRepositories();
        if (empty($repositories)) {
            $output->writeln('<info>gh-pages-deploy.json is empty.</info>');
        }
        else {
            $deploy->update();
        }
    }
}
