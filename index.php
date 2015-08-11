<?php

$_SERVER['CONTEXT_PREFIX'] = "/adminLT/";

//require_once (__DIR__."/../NeoPHP2/sources/bootstrap.php");
require_once ("/Users/YamilJuri/Documents/git/NeoPHP2/sources/bootstrap.php");
NeoPHP\core\ClassLoader::getInstance()->addIncludePath(__DIR__."/src");
org\fmt\WebApplication::getInstance()->handleRequest();

        

?>