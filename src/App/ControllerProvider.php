<?php

namespace App;

use App\Controller\HomeController;
use Silex\Application;
use Silex\ControllerProviderInterface;

class ControllerProvider implements ControllerProviderInterface
{
    /**
     * @var array
     */
    private $routes;

    /**
     * ControllerProvider constructor.
     * @param array $routes
     */
    public function __construct(
        array $routes = []
    ) {
        $this->routes = $routes;
    }

    /**
     * @param Application $app
     * @return mixed
     */
    public function connect(Application $app)
    {
        $this->registerControllers($app);

        $controllers = $app['controllers_factory'];

        foreach ($this->routes as $route => $controller) {
            $controllers->get($route, $controller);
        }

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
