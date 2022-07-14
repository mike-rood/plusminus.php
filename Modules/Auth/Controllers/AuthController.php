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
        if (isset($_SESSION['userName'])) { 
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
        $requestMethod = filter_input(INPUT_SERVER, 'REQUEST_METHOD');
        if ($requestMethod == 'POST' ) {
            $this->postLogin();
        } else {
            $this->getLogin();
        }
    }
    
    public function getLogin($messages = []){
        include '../Modules/Auth/Views/loginTemplate.php';
    }
    
    public function postLogin(){
        $loginData['loginEmail'] = filter_input(INPUT_POST, 'loginemail', FILTER_VALIDATE_EMAIL);
        $loginData['loginPass'] = filter_input(INPUT_POST, 'loginpass');
        $validator = ValidationController::getInstance();
        
        $errors = $validator->isEmpty($loginData);
        
        if ($errors) {
            $this->getLogin($errors);
        } else {
            $result[] = AuthModel::login($loginData);
            $this->getLogin($result);
        }
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
        $signupData['userName'] = filter_input(INPUT_POST, 'username');
        $signupData['userPass'] = filter_input(INPUT_POST, 'userpass');
        $signupData['userEmail'] = filter_input(INPUT_POST, 'useremail', FILTER_VALIDATE_EMAIL);
        $signupData['userBirthday'] = filter_input(INPUT_POST, 'userbirthday');
        
        $validator = ValidationController::getInstance();
        
        $errors = $validator->isEmpty($signupData);
        
        if ($errors) {
            $this->getSignup($errors);
        } else {
            $result[] = AuthModel::signup($signupData);
            $this->getSignup($result);
        }
    }
    
}
