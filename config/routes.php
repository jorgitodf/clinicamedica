<?php

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {

    $routes->connect('/', ['controller' => 'Home', 'action' => 'index']);

    $routes->connect('/testes/add', ['controller' => 'Testes', 'action' => 'add']);

    //$routes->connect('/users/login', ['controller' => 'Users', 'action' => 'login']);
    $routes->connect('/usuarios/login', ['controller' => 'Usuarios', 'action' => 'login']);
    $routes->connect('/usuarios/cadastrar', ['controller' => 'Usuarios', 'action' => 'cadastrar']);
    $routes->connect('/usuarios/add', ['controller' => 'Usuarios', 'action' => 'add']);


    $routes->fallbacks(DashedRoute::class);
});

Plugin::routes();
