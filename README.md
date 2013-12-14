# GitHub Pages Deploy

Deploys a number of repositories using the `gh-pages` branch, and keep the up to
date.


## Installation

1. Install Composer:
``` bash
$ php -r "eval('?>'.file_get_contents('https://getcomposer.org/installer'));"
```

2. Use Composer to download GitHub Pages Deploy:
``` bash
$ php composer.phar create-project robloach/gh-pages-deploy
```


## Usage

1. Create a `gh-pages-deploy.json` file:
``` json
{
    "mywebsite": "https://github.com/my/website.git",
    "myotherwebsite": "https://github.com/my/otherwebsite.git"
}
```

2. Execute GitHub Pages Deploy to deploy all sites:
``` bash
$ gh-pages-deploy/bin/gh-pages-deploy deploy
```
