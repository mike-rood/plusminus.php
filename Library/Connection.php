<?php

namespace Library;

/**
 * Description of QueryHelper
 *
 * @author mihej
 */

use Library\Settings;

trait Connection {
    private static function setConnection($destination) {
        $settings = Settings::getInstance();
        $dsn = $settings->getSetting($destination);
        $user = $settings->getSetting('dbuser');
        $pass = $settings->getSetting('dbpass');
        $pdo = new \PDO($dsn, $user, $pass);
        return $pdo;
    }    
}
