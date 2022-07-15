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
        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute();
        if ($result) {
            $_SESSION['userName'] = $userName;
            $_SESSION['userEmail'] = $userEmail;
            return "Регистрация выполнена успешно";
        } else {
            return "Что-то пошло не так...";
        }
    }

    public static function login($loginData = []) {
        $typedEmail = $loginData['loginEmail'];
        $typedPass = $loginData['loginPass'];
        $isEmail = self::checkEmail($typedEmail);
        $isCorrectPass = self::checkPass($typedEmail, $typedPass);
        if (! $isEmail) {
            return "No user";
        }
        if ($isCorrectPass) {
            $_SESSION['userName'] = self::getName($typedEmail);
            $_SESSION['userEmail'] = $typedEmail;
            return "Welcome, {$_SESSION['userName']}!";
        } else {
            return "IncorrectPass";
        }
    }
    
    private static function checkEmail($typedEmail){
        $pdo = self::setConnection('dsn');
        $sql = "SELECT * FROM `users` WHERE `email` LIKE '{$typedEmail}' LIMIT 1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        if ($result) {
            return 1;
        } else {
            return 0;
        }        
    }
    
    private static function checkPass($typedEmail, $typedPass) {
        $pdo = self::setConnection('dsn');
        $sql = "SELECT `password` FROM `users` WHERE `email` LIKE '{$typedEmail}' LIMIT 1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $queryResult = $stmt->fetch(\PDO::FETCH_OBJ);
        $hashedPass = $queryResult->password;
        $result = password_verify($typedPass, $hashedPass);
        return $result;
    }
    
    private static function getName($userEmail) {
        $pdo = self::setConnection('dsn');
        $sql = "SELECT `name` FROM `users` WHERE `email` LIKE '{$userEmail}' LIMIT 1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $queryResult = $stmt->fetch(\PDO::FETCH_OBJ);
        return $queryResult->name;
    }
    
}
