<?php

namespace Modules\Core\Controllers;

/**
 * Description of ViewController
 *
 * @author mihej
 */

use Modules\Core\Views\Head\HeadView;
use Modules\Core\Views\Body\BodyView;

class ViewController {
    
    use \Library\Singleton;
    
    public function getPage() {
        $head = new HeadView();
        $body = new BodyView();
        $head->getHead();
        $body->getBody();
    }    
}
