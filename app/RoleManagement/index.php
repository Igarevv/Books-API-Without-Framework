<?php

use App\Core\Container\Container;
use App\RoleManagement\Exception\RoleManagementException;
use App\RoleManagement\User\Role;
use App\RoleManagement\User\User;

const APP_PATH = '/var/www/nginx/books-api.conf';

require APP_PATH . '/vendor/autoload.php';

$container = new Container();

$user = new User($container, new \App\Config\Config());

try{
    $userId = isset($argv[1]) && is_numeric($argv[1]) ? $argv[1] : 0;
    $role = $argv[2] ?? '';

    (new Role($user))->changeRole($userId, $role);

    echo 'Role was successfully changed. User must re-login to apply changes.';
} catch(RoleManagementException $e){
    echo $e->getMessage();
}