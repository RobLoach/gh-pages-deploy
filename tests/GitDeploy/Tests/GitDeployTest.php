<?php

namespace GitDeploy\Tests\GitDeployTest;

use GitDeploy\GitDeploy;

class GitDeployTest extends \PHPUnit_Framework_TestCase
{
    protected $fixtures;

    public function __construct() {
        $this->fixtures = __DIR__ . '/Fixtures/';
    }

    public function testFromFile() {
        $gitdeploy = GitDeploy::fromFile($this->fixtures . 'git-deploy.json');
        $this->assertNotEmpty($gitdeploy);
    }
}
