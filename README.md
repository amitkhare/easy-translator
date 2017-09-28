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
## Sample Lang
```
{

"FIELDS_DONT_MATCH" : "The `%s` dont match with `%s`.",
"FIELD_REQUIRED" : "The `%s` is required.",
"FIELD_NOT_SET" : "The `%s` field is not set.",
"FIELD_INVALID_IPV4": "The `%s` field is an invalid IPv4.",
"FIELD_INVALID_IPV6": "The `%s` field is an invalid IPv6.",
"FIELD_INVALID_FLOAT" : "The `%s` field is an invalid float.",
"FIELD_INVALID_STRING" : "The `%s` field is an invalid .",
"FIELD_INVALID_ALPHA" : "The `%s` field is an invalid alphabetical value.",
"FIELD_INVALID_ALPHA_NUMERIC" : "The `%s` field is an invalid alpha-numerical value.",
"FIELD_INVALID_ALPHA_NUMERIC_UNICODE" : "The `%s` field is an invalid alpha-numerical-unicode value.",
"FIELD_INVALID_NUMERIC" : "The `%s` field is not a numeric value.",
"FIELD_INVALID_URL" : "The `%s` field is an invalid URL.",
"FIELD_INVALID_EMAIL" : "The `%s` field is an invalid email.",
"FIELD_INVALID_BOOLEAN" : "The `%s` field is not a boolean.",
"FIELD_VALUE_ALREADY_EXISTS" : "The `%s` field value already exists in database.",
"DB_NOT_CONNECTED" : "Database not connected. Database related rules will be unavailable. Can not apply `unique.%s` rule.",
"FIELD_VALUE_TOO_LONG" : "The `%s` field value is too long, it should not more than `%s` characters.",
"FIELD_VALUE_TOO_SHORT" : "The `%s` field value is too short, it should be at least `%s` characters long.",

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
