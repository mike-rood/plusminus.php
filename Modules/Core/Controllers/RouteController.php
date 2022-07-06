<?php

namespace Modules\Core\Controllers;

/**
 * Description of RouteController
 *
 * @author mihej
 */
class RouteController {
    
    use \Library\Singleton;
    
    private $routes = [];
    
    public function addRoute($request, $destination) {
        $this->routes[$request] = $destination;        
    }
    
    public function route(){
        $userRequest = filter_input(INPUT_SERVER, 'REQUEST_URI');
        if (array_key_exists($userRequest, $this->routes)) {
            $destination = explode('@', $this->routes[$userRequest]);
            $calledController = '\Modules\Core\Controllers\\' . $destination[0];
            $controller = $calledController::getInstance();
            $method = $destination[1];
            $controller->{$method}();
        } else {
            echo "Нет такого роута";
        }
    }
}
