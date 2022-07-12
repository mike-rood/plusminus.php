<?php

namespace Modules\Auth\Models;

use Library\Connection;

/**
 * Description of AuthModel
 *
 * @author mihej
 */

class AuthModel {
    
    use Connection;
    
    public static function signup($signupData = []) {
        $pdo = self::setConnection('dsn');
        $userName = $signupData['userName'];
        $userHashedPass = password_hash($signupData['userPass'], PASSWORD_DEFAULT);
        $userEmail = $signupData['userEmail'];
        $userBirhday = $signupData['userBirthday'];        
        $sql = "INSERT INTO `users`(`name`, `password`, `email`, `birthday`) VALUES ('{$userName}', '{$userHashedPass}', '{$userEmail}', '{$userBirhday}')";
        echo $sql;
        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute();
        if ($result) {
            return "Регистрация выполнена успешно";
        } else {
            return "Что-то пошло не так...";
        }
    }    
}
