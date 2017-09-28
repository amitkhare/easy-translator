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

## Minimal Usage:
```sh
<?php
    require __DIR__.'/../vendor/autoload.php';
    
    $t = new AmitKhare\EasyTranslator\EasyTranslator();
    
    $t->setLocalePath("PATH/TO/LOCALES/DIRECTORY/");
    
    // save a hi-IN.lang file in above location,
    // Note: file extention should be `.lang`
    // i.e. :  en-IN.lang, hi-IN.lang, en-US.lang, en-UK.lang
    
    $t->setLocale("hi-IN"); 
    
    echo $t->translate("FIELD_NOT_SET",["USERNAME"]);
    //OUTPUT: `यूजरनेम` फील्ड खली है.    
 
```
## Usage:
```sh
<?php
    use AmitKhare\EasyTranslator; // use namespace.
    // autoload via composer
    require __DIR__.'/../vendor/autoload.php';
    
    // require("PATH-TO/"."EasyTranslator.php"); // if installed manually.
    
    $t = new EasyTranslator(); // instantiate EasyTranslator;
    
    $t->setLocalePath("PATH/TO/LOCALES/DIRECTORY/"); 
    
    // save a hi-IN.lang file in above location,
    // Note: file extention should be `.lang`
    // i.e. :  en-IN.lang, hi-IN.lang, en-US.lang, en-UK.lang
    
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
## Sample en-IN.lang file  [[ JSON FORMAT ]]
```
    {

    "FIELDS_DONT_MATCH" : "The `%s` dont match with `%s`.",
    "FIELD_REQUIRED" : "The `%s` is required.",
    "FIELD_NOT_SET" : "The `%s` field is not set.",

    "USERNAME":"Username",
    "FIRSTNAME":"First Name",
    "LASTNAME":"Last Name",
    "MIDDLENAME":"Middle Name",
    "EMAIL":"Email",
    "PASSWORD":"Password",
    "MOBILE":"Mobile",
    "PASSWORD_CONFIRM":"Password Confirm"

    }
```
