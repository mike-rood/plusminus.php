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
    
    public function validateSignup($signupData = []) {
        $errors = [];
        foreach ($signupData as $key => $value) {            
            if ($value == '') {
                $errors[] = "Введено некорректное значение {$key}";
            }
        }
        return $errors;
    }
    
}
