# GitHub Pages Deploy

Deploy and maintain a number of static web applications on GitHub pages.


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

3. Set up a cron job to deploy every once in a while.
``` bash
$ gh-pages-deploy/bin/gh-pages-deploy deploy
```


## License

Licensed under the incredibly [permissive](http://en.wikipedia.org/wiki/Permissive_free_software_licence) [MIT license](http://creativecommons.org/licenses/MIT/)

Copyright &copy; Rob Loach (http://robloach.net)
