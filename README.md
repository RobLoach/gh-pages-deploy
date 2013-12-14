# GitHub Pages Deploy

[![Build Status](https://travis-ci.org/RobLoach/GitHubPagesDeploy.png)](https://travis-ci.org/RobLoach/GitHubPagesDeploy)
[![Coverage Status](https://coveralls.io/repos/RobLoach/GitHubPagesDeploy/badge.png?branch=master)](https://coveralls.io/r/RobLoach/GitHubPagesDeploy?branch=master)
[![Total Downloads](https://poser.pugx.org/RobLoach/GitHubPagesDeploy/downloads.png)](https://packagist.org/packages/RobLoach/GitHubPagesDeploy)
[![Latest Stable Version](https://poser.pugx.org/RobLoach/GitHubPagesDeploy/v/stable.png)](https://packagist.org/packages/RobLoach/GitHubPagesDeploy)

Deploys a number of repositories using the `gh-pages` branch, and keep the up to
date.

## Installation

GitHub Pages Deploy can be installed with [Composer](http://getcomposer.org)
by adding it as a dependency to your project's composer.json file.

```json
{
    "require-dev": {
        "robloach/gh-pages-deploy": "*"
    }
}
```

Please refer to [Composer's documentation](https://github.com/composer/composer/blob/master/doc/00-intro.md#introduction)
for more detailed installation and usage instructions.

## Usage

1. Download GitHub Pages Deploy with Composer

``` bash
$ php -r "eval('?>'.file_get_contents('https://getcomposer.org/installer'));"
$ php composer.phar create-project robloach/php-pages-deploy
```

2. Create a `gh-pages-deploy.json` file:

``` json
{
    "mywebsite": "https://github.com/my/website.git",
    "myotherwebsite": "https://github.com/my/otherwebsite.git"
}
```

3. Execute GitHub Pages Deploy

``` bash
$ gh-pages-deploy/bin/gh-pages-deploy deploy
```
