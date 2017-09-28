<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
    function dd($d){
        echo "<pre>";
        print_r($d);
        die;
    }
    use AmitKhare\EasyValidation; // use namespace.
    // autoload via composer
    require __DIR__.'/../vendor/autoload.php';
    // OR
    // require("PATH-TO/"."validbit.php"); // only need to include if installed manually.
    
    $v = new EasyValidation(); // instantiate EasyValidation;
	//  OR with database for unique field check
    //$v = new EasyValidation($host,$username,$password,$dbname); // instantiate EasyValidation With Database features;
    $v->setSource($_GET); // set data source array;
    
    $v->setLocale("hi-IN",__DIR__."/../src/locales/"); 
    
    $v->check("mobile","required|numeric|min:10|max:15");
    $v->check("username","required|min:4|max:20");
    $v->check("email","required|email|unique:users.email|min:4|max:100");
    
    $v->match("password","password_confirm");
    
    if(!$v->isValid()){
    	dd($v->getStatus());
    }
