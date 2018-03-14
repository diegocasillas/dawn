<?php

define('DB_NAME', 'miniframework');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_CONNECTION', 'mysql:host=127.0.0.1');

define('PUBLICFOLDER', '/miniframework/public');

define('CONFIG', require 'config.php');
define('ROUTES', 'app/routes/routes.php');
define('ROUTES_API', 'app/routes/routesAPI.php');
define('SERVICE_PROVIDERS', [
    'router' => '\\Dawn\\Routing\\RoutingServiceProvider',
    'auth' => '\\Dawn\\Auth\\AuthServiceProvider'
]);