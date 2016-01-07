<?php

namespace App;

use Igorw\Silex\ConfigServiceProvider;
use Silex\Application;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Silex\ServiceProviderInterface;

class AppServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $configPath = $app['app_path'] . '/config/';
        $commonConfig = $configPath . 'common.inc.php';
        $envConfig = $configPath . $app['app_env'] . '.inc.php';

        // register the config service provider first

        $app->register(new ConfigServiceProvider($commonConfig));

        $app->register(new ConfigServiceProvider($envConfig));

        // so we can then pull other service provider config out

        $app->register(new ServiceControllerServiceProvider());

        $app->register(new TwigServiceProvider(), $app['config']['twig']);
    }

    public function boot(Application $app)
    {

    }
}
