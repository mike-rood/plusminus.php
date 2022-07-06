<?php

namespace Modules\Migrations;

/**
 * Description of 0000
 *
 * @author mihej
 */

class Migration0000 {
    
    use \Library\Singleton;
    
    static public function up() {
        $query = "CREATE DATABASE IF NOT EXISTS plusminus "
                . "CHARACTER SET utf8mb4 "
                . "COLLATE utf8mb4_general_ci";
        return $query;
    }
    
    static public function down() {
        $query = "DROP DATABASE IF EXISTS plusminus";
        return $query;
    }
    
}
