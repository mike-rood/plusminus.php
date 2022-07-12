<?php

namespace Modules\Auth\Controllers;

use Modules\Auth\Controllers\ValidationController;
use Modules\Counter\Controllers\CounterController;
use Modules\Auth\Models\AuthModel;

use Library\Singleton;

/**
 * Description of AuthController
 *
 * @author mihej
 */
class AuthController {
    
    use Singleton;
    
    public function auth() {
        if (isset($_SESSION['user'])) { 
            $counter = CounterController::getInstance();
            $counter->index();
        } else { 
            $this->index();
        } 
    }
    
    public function index() {
        include '../Modules/Auth/Views/authTemplate.php';
    }
        
    public function login() {
        include '../Modules/Auth/Views/loginTemplate.php';
    }
    
    public function signup() {
        $requestMethod = filter_input(INPUT_SERVER, 'REQUEST_METHOD');
        if ($requestMethod == 'POST' ) {
            $this->postSignup();
        } else {
            $this->getSignup();
        }
    }
    
    public function getSignup($messages = []) {
        include '../Modules/Auth/Views/signupTemplate.php';
    }
    
    public function postSignup() {
        $signupData['userName'] = strip_tags(trim(filter_input(INPUT_POST, 'username')));
        $signupData['userPass'] = strip_tags(trim(filter_input(INPUT_POST, 'userpass')));
        $signupData['userEmail'] = filter_input(INPUT_POST, 'useremail', FILTER_VALIDATE_EMAIL);
        $signupData['userBirthday'] = filter_input(INPUT_POST, 'userbirthday');
        
        $validator = ValidationController::getInstance();
        
        $errors = $validator->validateSignup($signupData);
        
        if ($errors) {
            $this->getSignup($errors);
        } else {
            $result[] = AuthModel::signup($signupData);
            $this->getSignup($result);
        }
    }
    
}
