<?php

//require_once (__DIR__."/../NeoPHP2/sources/bootstrap.php");
require_once ("/home/yamil/NeoPHP2/sources/bootstrap.php");
NeoPHP\core\ClassLoader::getInstance()->addIncludePath(__DIR__."/src");
org\fmt\WebApplication::getInstance()->handleRequest();

?>