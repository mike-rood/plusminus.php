<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace Modules\Migrations;

/**
 * Description of Migration0002
 *
 * @author mihej
 */
class Migration0002 {
    public static function up(){
        $query = "ALTER TABLE `users` "
                . "ADD `birthday` DATE NOT NULL AFTER `email`, "
                . "ADD `clicks` INT(5) NOT NULL DEFAULT '0' AFTER `birthday`; ";
        return $query;
    }
    
    public static function down() {
        $query = "ALTER TABLE `users` "
                . "DROP `birthday`, "
                . "DROP `clicks`";
        return $query;
    }
    
}
