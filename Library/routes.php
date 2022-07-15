<?php

use Modules\Core\Controllers\RouteController;

$routeController = RouteController::getInstance();

$routeController -> addRoute('/', 'authController@auth');
$routeController -> addRoute('/auth', 'authController@auth');
$routeController -> addRoute('/login', 'authController@login');
$routeController -> addRoute('/logout', 'authController@logout');
$routeController -> addRoute('/signup', 'signupController@signup');
$routeController -> addRoute('/counter', 'authController@auth');

