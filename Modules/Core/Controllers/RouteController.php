<?php

namespace Modules\Core\Controllers;

/**
 * Description of RouteController
 *
 * @author mihej
 */

use Modules\Core\Controllers\ViewController;

class RouteController {
    
    use \Library\Singleton;
    
    private function __construct() {
        $this->routes = [];
    }
    
    public function addRoute($request, $destination) {
        $this->routes[$request] = $destination;        
    }
        
    public function route(){
        $routes = $this->routes;
        $userRequest = filter_input(INPUT_SERVER, 'REQUEST_URI');
        if (array_key_exists($userRequest, $routes)) {
            $destination = explode('@', $routes[$userRequest]);
            $method = $destination[0];
            $controller = $destination[1];
            $action = $destination[2];
            
            $view = ViewController::getInstance();
            $view->getPage();
            
        } else {
            echo "Нет такого роута";
        }
    }
}
