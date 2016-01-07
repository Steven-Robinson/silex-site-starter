<?php

use App\ControllerProvider;
use App\SiteServiceProvider;
use Silex\Application;

require_once __DIR__.'/../vendor/autoload.php';

$app = new Application();

$app['app_path'] = __DIR__ . '/../';
$app['debug'] = true;

$app->register(new SiteServiceProvider())
    ->mount('/', new ControllerProvider())
    ->run();
