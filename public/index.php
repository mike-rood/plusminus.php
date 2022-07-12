<?php

session_start();

require_once '../Library/autoload.php';
require_once '../Library/routes.php';

#Run migration if db update is required

#use Modules\Core\Models\MigrationModel;
#MigrationModel::executeMigration('dsn', 'Modules\Migrations\Migration0002', 'up'); 

$routeController->route();