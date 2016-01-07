<?php

use App\Controller\HomeController;

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

// register services

$app->register(new Silex\Provider\ServiceControllerServiceProvider());

$app->register(new Silex\Provider\TwigServiceProvider(), [
    'twig.path' => __DIR__ . '/../resources/views',
]);

// register container entries

$app['home.controller'] = $app->share(function() use ($app) {
    return new HomeController($app);
});

// register routes

$app->get('/', "home.controller:indexAction");

$app->run();