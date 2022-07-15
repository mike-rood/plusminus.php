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
            $this->postLoginQuery();
        } else {
            $this->getLoginPage();
        }
    }
    
    public function logout() {
        unset($_SESSION['userName']);
        unset($_SESSION['userEmail']);
        $this->auth();
    }
    
    public function getLoginPage($messages = []){
        include '../Modules/Auth/Views/loginTemplate.php';
    }
    
    public function postLoginQuery(){
        $loginData['loginEmail'] = filter_input(INPUT_POST, 'loginemail', FILTER_VALIDATE_EMAIL);
        $loginData['loginPass'] = filter_input(INPUT_POST, 'loginpass');
        $validator = ValidationController::getInstance();
        
        $errors = $validator->isEmpty($loginData);
        
        if ($errors) {
            $this->getLoginPage($errors);
        } else {
            $result[] = AuthModel::login($loginData);
            $this->getLoginPage($result);
        }
    }
}
