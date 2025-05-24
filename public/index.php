<?php
require '../helpers.php';
require basePath('Framework/Database.php');
require basePath('Framework/router.php');

// Instantiate the router 
$router = new Router();
// Get routes
$routes = require basePath('routes.php');
// Get current URI and HTTP method
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];
inspect($uri);
// Route the request
$router->route($uri, $method);
