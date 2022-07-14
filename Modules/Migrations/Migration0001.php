<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace Modules\Migrations;

/**
 * Description of Migration0001
 *
 * @author mihej
 */
class Migration0001 {
    
    static public function up(){
        $query = "CREATE TABLE IF NOT EXISTS `plusminus`.`users` "
                . "( `id` INT(5) NOT NULL AUTO_INCREMENT , "
                . "`name` VARCHAR(30) NOT NULL , "
                . "`password` VARCHAR(255) NOT NULL , "
                . "`email` VARCHAR(40) NOT NULL , "
                . "PRIMARY KEY (`id`), UNIQUE (`email`)) "
                . "ENGINE = MyISAM; ";
        return $query;
    }
    
    static public function down() {
        $query = "DROP TABLE `users`";
        return $query;
    }
    
}
