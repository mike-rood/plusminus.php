<?php

namespace Library;

/**
 * Description of Settings
 *
 * @author mihej
 */
class Settings {
    use Singleton;
    
    private function __construct() {
        $this->dsnNoDb = 'mysql:host=localhost;port=3306';
        $this->dsn = 'mysql:host=localhost;port=3306;dbname=plusminus';
        $this->dbuser = 'root';
        $this->dbpass = '';
    }
    
    public function getSetting(string $setting){
        return $this->$setting;
        }
    }
