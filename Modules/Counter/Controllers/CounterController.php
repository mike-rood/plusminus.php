<?php

namespace Modules\Counter\Controllers;

/**
 * Description of CounterController
 *
 * @author mihej
 */

use Modules\Counter\Models\CounterModel;

use Library\Singleton;

class CounterController {
    
    use Singleton;
    
    public function index() {
        $requestMethod = filter_input(INPUT_SERVER, 'REQUEST_METHOD');
        if ($requestMethod == 'POST' ) {
            $this->postCounterQuery();
        } else {
            $this->getCounterPage();
        }
    }
    
    private function getCounterPage() {
        $counterValue = CounterModel::getCounterValue($_SESSION['userEmail']);
        include_once '../Modules/Counter/Views/counterTemplate.php';
    }
    
    private function postCounterQuery() {
        if ((NULL !== filter_input(INPUT_POST, 'minus')) && (NULL === filter_input(INPUT_POST, 'plus'))) {
            CounterModel::setCounterValue(-1, $_SESSION['userEmail']);
        } elseif ((NULL === filter_input(INPUT_POST, 'minus')) && (NULL !== filter_input(INPUT_POST, 'plus'))) {
            CounterModel::setCounterValue(1, $_SESSION['userEmail']);
        } else {
            $this->getCounterPage();
        }
        $this->getCounterPage();
    }
    
}
