<?php

namespace GitHubPagesDeploy;

use GitWrapper\GitWrapper;
use GitWrapper\GitWorkingCopy;

class GitHubPagesDeploy
{
    protected $repositories;

    public function __construct($repositories = array())
    {
        $this->repositories = $repositories;
    }

    public static function fromFile($file = 'gh-pages-deploy.json')
    {
        $results = array();

        if (is_file($file)) {
            $contents = file_get_contents($file);
            $results = json_decode($contents);
        }

        return new GitHubPagesDeploy($results);
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

            // Remove any local changes.
            $git->reset(array('hard' => true));

            // Clean up the repository.
            $git->run(array('clean', array('d' => TRUE, 'f' => TRUE)));

            // Ensure we are on the correct branch.
            $git->checkout('gh-pages', array('force' => TRUE));

            // Finally, pull in the changes.
            $git->pull();
        }
    }

    public function getRepositories()
    {
        return $this->repositories;
    }
}
