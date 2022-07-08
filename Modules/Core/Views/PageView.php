<?php

namespace Modules\Core\Views;

use Modules\Auth\Controllers\AuthController;
use Modules\Counter\Controllers\CounterController;

use Library\Singleton;
use Library\Settings;

/**
 * Description of PageView
 *
 * @author mihej
 */
class PageView {
    
    use Singleton;    
    
    public function page($controller, $action) {       
        
        $authController = AuthController::getInstance();
        $counterController = CounterController::getInstance();
        $settings = Settings::getInstance();
        include_once 'pageTemplate.php';
        
    }
}    