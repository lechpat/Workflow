<?php
use Cake\Routing\Router;

Router::prefix('admin', function ($routes) {
    // All routes here will be prefixed with `/admin`
    // And have the prefix => admin route element added.
    $routes->plugin('Workflow', function ($routes) {
        $routes->fallbacks('InflectedRoute');
    });
});
