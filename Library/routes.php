<?php

use Modules\Core\Controllers\RouteController;

$routeController = RouteController::getInstance();

$routeController -> addRoute('/', 'GET@authController@auth');
$routeController -> addRoute('/auth', 'GET@authController@auth');
$routeController -> addRoute('/login', 'GET@authController@login');
$routeController -> addRoute('/signup', 'GET@authController@signup');
$routeController -> addRoute('/counter', 'GET@authController@auth');

