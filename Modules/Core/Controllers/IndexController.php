<?php

namespace Modules\Core\Controllers;

/**
 * Description of IndexController
 *
 * @author mihej
 */

class IndexController {
    
    use \Library\Singleton;
    
    public function indexAction() {
        include_once '../Modules/Core/Views/template.php';
    }
}
