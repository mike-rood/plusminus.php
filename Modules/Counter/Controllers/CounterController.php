<?php

namespace Modules\Counter\Controllers;

/**
 * Description of CounterController
 *
 * @author mihej
 */

use Library\Singleton;

class CounterController {
    
    use Singleton;
    
    public function index() {
        include_once '../Modules/Counter/Views/counterTemplate.php';
    }
}
