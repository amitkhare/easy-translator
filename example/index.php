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
    
