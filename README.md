# amitkhare/easy-translator
Easy Translator is an easy to use PHP translation library

## Install

Run this command from the directory in which you want to install.

### Via Composer:

    php composer.phar require amitkhare/easy-translator

### Via Git:

    git clone https://github.com/amitkhare/easy-translator.git

### Manual Install:

    Download: https://github.com/amitkhare/easy-translator/archive/master.zip
    Extract it, require "PATH-TO/"."EasyTranslator.php" where you want to use it.

## Usage:
```sh
<?php
use AmitKhare\EasyTranslator; // use namespace.
require("PATH-TO/"."EasyTranslator.php"); // only need to include if installed manually.

$t = new EasyTranslator(); // instantiate EasyTranslator;
$t->setLocalePath("PATH/TO/LOCALES/DIRECTORY/"); 
$t->setLocale("en-IN"); 

echo $t->translate($keyString,$replacements,$locale);
 
```
## Available Methods:
    > $t->setLocalePath("PATH/TO/LOCALES/DIRECTORY/"); 
    > $t->setLocale("en-IN");
    > $t->translate($keyString,$replacements,$locale);