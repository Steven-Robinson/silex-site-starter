<?php

use App\Controller\HomeController;

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

// ToDo: Move all the following into a bootstrap class

// register services

$app->register(new Silex\Provider\ServiceControllerServiceProvider());

// register container entries

$app['home.controller'] = $app->share(function() {
    return new HomeController();
});

// register routes

$app->get('/', "home.controller:indexAction");

$app->run();
