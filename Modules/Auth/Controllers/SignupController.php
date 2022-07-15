<?php

namespace Modules\Auth\Controllers;

/**
 * Description of SignupController
 *
 * @author mihej
 */

use Modules\Auth\Controllers\ValidationController;
use Modules\Counter\Controllers\CounterController;
use Modules\Auth\Models\AuthModel;

use Library\Singleton;

class SignupController {
    
    use Singleton;
    
    public function signup() {
        if ((isset($_SESSION['userName'])) || isset($_SESSION['userEmail'])) {
            $counter = CounterController::getInstance();
            $counter->index();
        }
        $requestMethod = filter_input(INPUT_SERVER, 'REQUEST_METHOD');
        if ($requestMethod == 'POST' ) {
            $this->postSignupQuery();
        } else {
            $this->getSignupPage();
        }
    }
    
    public function getSignupPage($messages = []) {
        include '../Modules/Auth/Views/signupTemplate.php';
    }
    
    public function postSignupQuery() {
        $signupData['userName'] = filter_input(INPUT_POST, 'username');
        $signupData['userPass'] = filter_input(INPUT_POST, 'userpass');
        $signupData['userEmail'] = filter_input(INPUT_POST, 'useremail', FILTER_VALIDATE_EMAIL);
        $signupData['userBirthday'] = filter_input(INPUT_POST, 'userbirthday');
        
        $validator = ValidationController::getInstance();
        
        $errors = $validator->isEmpty($signupData);
        $errors[] = $validator->checkBirthday($signupData['userBirthday']);
        
        if ($errors) {
            $this->getSignupPage($errors);
        } else {
            die();
            $result[] = AuthModel::signup($signupData);
            $this->getSignupPage($result);
        }
    }
}
