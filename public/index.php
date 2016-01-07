<?php

use App\ControllerProvider;
use App\AppServiceProvider;
use Silex\Application;

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Application();

$app['app_path'] = __DIR__ . '/../';
$app['app_env'] = $_SERVER['APP_ENV'];

$app->register(new AppServiceProvider())
    ->mount('/', new ControllerProvider())
    ->run();
