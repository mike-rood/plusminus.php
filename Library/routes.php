<?php

use Modules\Core\Controllers\RouteController;

$routeController = RouteController::getInstance();

$routeController -> addRoute('/', 'authController@auth');
$routeController -> addRoute('/auth', 'authController@auth');
$routeController -> addRoute('/login', 'authController@login');
$routeController -> addRoute('/signup', 'authController@signup');
$routeController -> addRoute('/counter', 'authController@auth');

