<?php

spl_autoload_register(function($class) { 
    $class = str_replace('\\', '/', $class);
    $class .= '.php';
    include_once "../" . $class;
});