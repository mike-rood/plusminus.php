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
        include '../Modules/Auth/Views/signupTemplate.php';
    }
    
}
