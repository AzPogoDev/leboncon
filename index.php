<?php
require_once 'vendor/autoload.php';

use App\Aware\AwareManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

$request = Request::createFromGlobals();
$request->setSession(new Session());

$routes = require 'config/routes.php';


if (isset($routes[$request->getPathInfo()])) {
    $controllerClassName = $routes[$request->getPathInfo()][0];
    $controllerMethodName = $routes[$request->getPathInfo()][1];

    $controller = new $controllerClassName();

    // // $awareManager = new AwareManager($request);
    // $awareManager->manage($controller);

    $response = $controller->{$controllerMethodName}();
} else {
    $response = new Response('<h1>Not Found</h1><p>The page you are looking for does not exist</p>');
}

$response->send();
