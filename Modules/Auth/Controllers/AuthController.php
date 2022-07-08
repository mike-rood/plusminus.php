<?php

namespace Modules\Auth\Controllers;

/**
 * Description of AuthController
 *
 * @author mihej
 */
class AuthController {
    
    use \Library\Singleton;
    
    public function loginAction() {
        include '../Modules/Core/Views/components/login.php';
    }
    
    public function signupAction() {
        include '../Modules/Core/Views/components/signup.php';
    }
    
}
