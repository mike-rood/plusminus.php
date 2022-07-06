<?php

namespace Library;

trait Singleton
{
    private static $_instance;
    
    private function __construct() {
        
    }
    
    private function __clone() {
        
    }
    
    public static function getInstance(){
        if (self::$_instance instanceof self) {
            return self::$_instance;
        } else {
            self::$_instance = new self;
            return self::$_instance;
        }
    }
    
    
}