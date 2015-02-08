<?php

namespace GitDeploy;

use GitWrapper\GitWrapper;
use GitWrapper\GitWorkingCopy;

class GitDeploy
{
    protected $projects = array();

    public function __construct(array $projects = array())
    {
        if (!empty($projects)) {
            $this->setProjects($projects);
        }
    }

    /**
     * Parses the given projects configuration array into valid configuration.
     */
    public function setProjects(array $projects = array())
    {
        $output = array();

        foreach ($projects as $name => $project) {
            if (is_string($project)) {
                $output[$name]['repo'] = $project;
            }
            elseif (is_array($project)) {
                $output[$name] = $project;
            }

            // Construct the default branches array if one is not given.
            if (!isset($output[$name]['branches']) || !is_array($output[$name]['branches'])) {
                $output[$name]['branches'] = array(
                    'gh-pages' => $name,
                );
            }
            else {
                $branches = array();
                foreach ($output[$name]['branches'] as $source => $destination) {
                    if (is_numeric($source)) {
                        $source = $destination;
                        $destination = $name . '-' . $source;
                    }
                    $branches[$source] = $destination;
                }
                $output[$name]['branches'] = $branches;
            }
        }

        $this->projects = $output;
    }

    public function getProjects()
    {
        return $this->projects;
    }

    public static function fromFile($file = 'git-deploy.json')
    {
        $results = array();

        if (is_file($file)) {
            $contents = file_get_contents($file);
            $results = json_decode($contents, true);
            if ($results === NULL) {
                throw new \UnexpectedValueException("The given JSON file could not be parsed.");
            }
        }

        return new GitDeploy($results);
    }

    public function deploy()
    {
        // Create the wrapper.
        $wrapper = new GitWrapper();
        $wrapper->streamOutput();

        // Iterate through each project.
        foreach ($this->projects as $name => $project) {
            // Check out all branches.
            foreach ($project['branches'] as $branch => $destination) {
                // Build our git interface.
                $git = null;
                if (!is_dir($destination)) {
                    $git = $wrapper->cloneRepository($project['repo'], $destination);
                }
                else {
                    $git = new GitWorkingCopy($wrapper, $destination);
                }

                // Fetch the latest.
                $git->fetch('origin');

                // Checkout the desired branch.
                $git->checkout($branch, array('force' => true));

                // Reset any local changes.
                $git->reset(array('hard' => true));

                // Pull the latest from the branch.
                $git->pull('origin', $branch, array('force' => true));
            }
        }
    }
}
