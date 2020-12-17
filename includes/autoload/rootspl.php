<?php

spl_autoload_register(function ($class_name){
    $path = 'classes/';
    $extension = '.php';
    $fullPath = $path . $class_name . $extension;

    include_once $fullPath;
});


