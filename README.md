# Git Deploy

Deploy and maintain a number of git repositories through PHP.


## Requirements

* PHP 5.4 or greater
* [Composer](http://getcomposer.org)


## Installation

1. Install Composer:

    ``` bash
    $ php -r "eval('?>'.file_get_contents('https://getcomposer.org/installer'));"
    ```

2. Use Composer to install Git Deploy:

    ``` bash
    $ php composer.phar create-project robloach/git-deploy
    ```


## Usage

1. Create a `git-deploy.json` file:

    ``` json
    {
        "mywebsite": "https://github.com/my/website.git",
        "myotherwebsite": {
          "repo": "https://github.com/my/otherwebsite.git"
        },
        "mythirdwebsite": {
          "repo": "https://github.com/my/otherwebsite.git",
          "branches": [
            "branch1",
            "branch2"
          ]
        },
        "myfourthwebsite": {
          "repo": "https://github.com/my/otherwebsite.git",
          "branches": {
            "branch1": "path/to/destination/branch1",
            "branch2": "path/to/destination/branch2",
            "branch3": "path/to/destination/branch3"
          }
        }
    }
    ```

2. Execute Git Deploy to deploy all sites:

    ``` bash
    gh-pages-deploy/bin/gh-pages-deploy deploy
    ```

3. Set up a cron job to deploy every once in a while.

    ``` bash
    gh-pages-deploy/bin/gh-pages-deploy deploy
    ```


## License

Licensed under the incredibly [permissive](http://en.wikipedia.org/wiki/Permissive_free_software_licence) [MIT license](http://creativecommons.org/licenses/MIT/)

Copyright &copy; Rob Loach (http://robloach.net)
