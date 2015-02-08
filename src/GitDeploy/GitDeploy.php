<?php

namespace GitDeploy;

use GitWrapper\GitWrapper;
use GitWrapper\GitWorkingCopy;

class GitDeploy
{
    protected $repositories;

    public function __construct($repositories = array())
    {
        $this->repositories = $repositories;
    }

    public static function fromFile($file = 'git-deploy.json')
    {
        $results = array();

        if (is_file($file)) {
            $contents = file_get_contents($file);
            $results = json_decode($contents);
        }

        return new GitDeploy($results);
    }

    public function update()
    {
        // Create the wrapper.
        $wrapper = new GitWrapper();
        $wrapper->streamOutput();

        foreach ($this->repositories as $dir => $repo) {
            // Build our git interface.
            $git = null;
            if (!is_dir($dir)) {
                $git = $wrapper->cloneRepository($repo, $dir);
            }
            else {
                $git = new GitWorkingCopy($wrapper, $dir);
            }

            // Fetch all the latest.
            $git->fetch('--all');

            // Reset over to the gh-pages branch.
            $git->reset('origin/gh-pages', array('hard' => true));

            // Remove any extra files.
            $git->clean('-d', '-f', '-x');
        }
    }

    public function getRepositories()
    {
        return $this->repositories;
    }
}
