# Exception

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/de6d745d2efe45749dd7a5e7331b66d5)](https://app.codacy.com/app/leet31337/exception?utm_source=github.com&utm_medium=referral&utm_content=JBlond/exception&utm_campaign=Badge_Grade_Dashboard)
[![SymfonyInsight](https://insight.symfony.com/projects/b24b1381-d4b5-4a56-8f1b-4064b3e3de6c/mini.svg)](https://insight.symfony.com/projects/b24b1381-d4b5-4a56-8f1b-4064b3e3de6c)

## Example

```PHP
use jblond\exception\ExceptionHandler;

require './vendor/autoload.php';

$debug = true;

if ($debug == false) {
    $exception = new ExceptionHandler(false, false);
    error_reporting(0);
    ini_set('display_errors', 'Off');
} else {
    $exception = new ExceptionHandler(true, true);
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');
}

```
