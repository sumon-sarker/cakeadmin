<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

Router::plugin(
    'CakeAdmin',
    ['path' => '/cake-admin'],
    function (RouteBuilder $routes) {
    	$routes->prefix('administrator', function ($routes) {
    		$routes->connect('/dashboard', ['plugin'=>'CakeAdmin','prefix'=>'administrator','controller' => 'users', 'action' => 'dashboard', 'index']);
            $routes->fallbacks('DashedRoute');
        });
        $routes->fallbacks('DashedRoute');
    }
);
