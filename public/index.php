<?php
session_start();

define('BASE_PATH', dirname(__DIR__));
define('CORE_PATH', BASE_PATH . '/core');
define('APP_PATH', BASE_PATH . '/app');
define('PUBLIC_PATH', BASE_PATH . '/public');

require_once CORE_PATH . '/Router.php';

$router = new Router();
$router->dispatch();
