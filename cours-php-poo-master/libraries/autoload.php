<?php

//function pour autoload classes
spl_autoload_register(function ($className) {
    $className = str_replace("\\", "/", $className);
    if (strpos($className, "/")){
        $className = lcfirst($className);
    }
    require_once('libraries/' . $className . '.php');
});
