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
    
}
