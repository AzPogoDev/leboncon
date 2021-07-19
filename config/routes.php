<?php

use App\Controller\HomeController;
use App\Controller\PostController;
use App\Controller\UserController;

$routes = [
    '/' => [HomeController::class, 'home'],
    '/annonce' => [PostController::class, 'annonce'],
    '/new-annonce' => [PostController::class, 'addAnnonce'],
    '/sign-in' => [UserController::class, 'signIn'],
    '/sign-up' => [UserController::class, 'signUp'],
    '/disconnect' => [UserController::class, 'signOut'],
];

return $routes;

