<?php
use Cake\Routing\Router;

Router::plugin('Auth', function ($routes) {
    $routes->fallbacks('DashedRoute');
});
