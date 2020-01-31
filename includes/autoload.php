<?php

spl_autoload_register('autoloader');

    function autoloader($classn){
        $path = "classes/";
        $ext = ".php";
        $fullpath = $path . $classn . $ext;

        include_once $fullpath;
}   