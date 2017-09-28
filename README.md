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
    // autoload via composer
    require __DIR__.'/../vendor/autoload.php';
    
    // require("PATH-TO/"."EasyTranslator.php"); // if installed manually.
    
    $t = new EasyTranslator(); // instantiate EasyTranslator;
    $t->setLocalePath("PATH/TO/LOCALES/DIRECTORY/"); 
    $t->setLocale("en-IN"); 
    
    $keyString = "FIELD_NOT_SET";
    $replacements = ["USERNAME"];
    $locale = "hi-IN";
    
    echo $t->translate($keyString);
    //OUTPUT: The field is not set.
    
    // OR ###########################################
    echo $t->translate($keyString,$replacements);
    //OUTPUT: The `Username` field is not set.
    
    // OR ###########################################
    echo $t->translate($keyString,$replacements,$locale);
    //OUTPUT: `यूजरनेम` फील्ड खली है.
    

 
```
## Available Methods:
    > $t->setLocalePath("PATH/TO/LOCALES/DIRECTORY/"); 
    > $t->setLocale("en-IN");
    > $t->translate($keyString,$replacements,$locale);
