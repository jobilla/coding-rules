## Finternet-Group's code quality inspections tools' configurations

### Full QA set for PHP code includes the following tools
* PHPUNIT (https://github.com/sebastianbergmann/phpunit)
* PHPCS (https://github.com/squizlabs/PHP_CodeSniffer)
* PHPMD (https://github.com/phpmd/phpmd)
* PHPCPD (https://github.com/sebastianbergmann/phpcpd)
* PHPLOC (https://github.com/sebastianbergmann/phploc)

### Recommended usage
Internally we're running automatic checks using a continuous integration server (Bamboo), but basically any continuous integration server should be capable of getting the job done. (highly recommended)

You should also be able to hook the tools into the text-editor / IDE of your choice. Below are some examples that our in-house developer team prefers.

#### PHPMD Plugins
https://github.com/AtomLinter/linter-phpmd  
https://github.com/SublimeLinter/SublimeLinter-phpmd  
https://www.jetbrains.com/help/phpstorm/10.0/using-php-mess-detector.html  


#### PHPCS Plugins
https://atom.io/packages/linter-phpcs  
https://github.com/SublimeLinter/SublimeLinter-phpcs  
https://www.jetbrains.com/help/phpstorm/10.0/using-php-code-sniffer-tool.html  

### Installing & running the checks
* Clone the repository / include into your project's composer.json
* If including via composer, run `composer update` to install the configuration files into your `vendor` folder
* Remember to include desired QA tools into your main projects `require-dev` part in composer.json, in order to use the actual tools + FG custom configuration files
* Example from our internal projects' composer.json  
```
    "require-dev": {
        "phpunit/phpunit": "~4.0",
        "squizlabs/php_codesniffer": "2.*",
        "phpmd/phpmd" : "@stable",
        "phploc/phploc": "*",
        "sebastian/phpcpd": "*",
        "finternet-group/coding-rules": "dev-master"
        },
    "repositories": [
        {
            "type": "vcs",
            "url": "git@github.com:finternet-group/coding-rules.git"
        }
    ]
```
* Run the tools via CLI or integrate into your development tools
* Running via CLI example:
```
$ vendor/bin/phpmd --reportfile ./phpmd-report.html app/ html vendor/finternet-group/coding-rules/phpmd/ruleset.xml
$ vendor/bin/phpcs --standard=./vendor/finternet-group/coding-rules/phpcs/ruleset.xml --report-file=./phpcs-report.txt app/
$ vendor/bin/phpcpd app/ > ../phpcpd-report.txt
$ vendor/bin/phploc app/ > ../phploc-report.txt
$ vendor/bin/phpunit > ./phpunit-report.txt
```

### Fixing code styling errors automatically
PHPCS ships with an executable called `phpcbf`, which allows automatically fixing some of the violations detected by the CodeSniffer. More info can be found through this link:   https://github.com/squizlabs/PHP_CodeSniffer/wiki/Fixing-Errors-Automatically  

Example of running `phpcbf` via CLI:  
```
$ vendor/bin/phpcbf --standard=vendor/finternet-group/coding-rules/phpcs/ruleset.xml app  
```


***The following repositories & authors' work have been used as a base for individual parts of the configuration, or have heavily influenced the end result:***  
https://github.com/bigbank-as/phpcs  
https://gist.github.com/slayerfat/2b3cc4faf94d2863b505
