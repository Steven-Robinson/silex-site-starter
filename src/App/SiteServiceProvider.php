<?php

namespace App;

use App\Controller\HomeController;
use Silex\Application;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Silex\ServiceProviderInterface;

class SiteServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['home.controller'] = $app->share(function () use ($app) {
            return new HomeController($app);
        });

        $app->register(new ServiceControllerServiceProvider());

        $app->register(new TwigServiceProvider(), [
            'twig.path' => $app['app_path'] . '/resources/views',
        ]);
    }

    public function boot(Application $app)
    {
    }
}
