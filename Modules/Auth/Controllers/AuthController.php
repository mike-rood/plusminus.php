<?php

namespace Modules\Auth\Controllers;

use Modules\Counter\Controllers\CounterController;

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
    
    public function getSignup() {
        include '../Modules/Auth/Views/signupTemplate.php';
    }
    
    public function postSignup() {
        $userName = strip_tags(trim(INPUT_POST, 'username'));
        $userPass = strip_tags(trim(INPUT_POST, 'userpass'));
        $userBirthday = filter_input(INPUT_POST, 'userbirthday');
        $userEmail = filter_input(INPUT_POST, 'useremail', FILTER_VALIDATE_EMAIL);
        
        echo $userBirthday;
    }
    
}
