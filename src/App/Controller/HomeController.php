<?php

namespace App\Controller;

use Silex\Application;

class HomeController
{
    /**
     * @var Application
     */
    private $app;

    /**
     * HomeController constructor.
     *
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function indexAction()
    {
        return $this->app['twig']->render('index.twig', []);
    }
}
