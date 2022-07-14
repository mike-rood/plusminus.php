<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace Modules\Counter\Models;

/**
 * Description of CounterModel
 *
 * @author mihej
 */

use Library\Connection;

class CounterModel {
    
    use Connection;
    
    public static function getCounterValue($userEmail) {
        $pdo = self::setConnection('dsn');
        $sql = "SELECT `clicks` FROM `users` WHERE `email` LIKE '{$userEmail}' LIMIT 1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_OBJ);
        return $result->clicks;
    }
    
    public static function setCounterValue(int $value, $userEmail) {
        $pdo = self::setConnection('dsn');
        $sql = "UPDATE `users` SET `clicks` = clicks + {$value} WHERE `email` = '{$userEmail}'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    }    
}
