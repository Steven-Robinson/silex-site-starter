<?php

namespace App;

use App\Controller\HomeController;
use Silex\Application;
use Silex\ControllerProviderInterface;

class ControllerProvider implements ControllerProviderInterface
{
    /**
     * @param Application $app
     * @return mixed
     */
    public function connect(Application $app)
    {
        $this->registerControllers($app);

        $controllers = $app['controllers_factory'];

        $controllers->get('/', 'home.controller:indexAction');

        return $controllers;
    }

    /**
     * @param Application $app
     */
    private function registerControllers(Application $app)
    {
        $app['home.controller'] = $app->share(function ($app) {
            return new HomeController($app['twig']);
        });
    }
}
