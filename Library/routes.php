<?php

use Modules\Core\Controllers\RouteController;

$routeController = RouteController::getInstance();

$routeController -> addRoute('/', 'GET@IndexController@index');
$routeController -> addRoute('/login', 'GET@AuthController@login');
$routeController -> addRoute('/signup', 'GET@AuthController@signup');

