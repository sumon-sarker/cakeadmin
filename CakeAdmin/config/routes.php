<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

Router::plugin(
    'CakeAdmin',
    ['path' => '/cake-admin'],
    function (RouteBuilder $routes) {
        $routes->fallbacks('DashedRoute');
    }
);
