<?php

namespace Modules\Auth\Controllers;

use Library\Singleton;

/**
 * Description of ValidationController
 *
 * @author mihej
 */
class ValidationController {
    
    use Singleton;
    
    public function isEmpty($userData = []) {
        $errors = [];
        foreach ($userData as $key => $value) {            
            if ($value == '') {
                $errors[] = "Введено пустое значение {$key}";
            }
        }
        return $errors;
    }
    
    public function checkBirthday($dateToCheck) {
        $today = new \DateTime(date('Y-m-d'));
        $birthday = new \DateTime($dateToCheck);
        $difference = $today->diff($birthday);
        $difFormatted = $difference->format('%y');
        if ($difFormatted < 5) {
            return "Слишком молоды";
        }
        if ($difFormatted > 150) {
            return "Слишком стары";        
        }
    }
    
}
