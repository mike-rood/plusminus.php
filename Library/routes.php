<?php

use Modules\Core\Controllers\RouteController;

$routeController = RouteController::getInstance();

$routeController -> addRoute('/', 'IndexController@indexAction');
$routeController -> addRoute('/login', 'AuthController@loginAction');
$routeController -> addRoute('/signup', 'AuthController@signupAction');

