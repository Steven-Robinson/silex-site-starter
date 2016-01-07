<?php

namespace App\Controller;

class HomeController
{
    /**
     * @var \Twig_Environment
     */
    private $twig;

    /**
     * HomeController constructor.
     * @param \Twig_Environment $twig
     */
    public function __construct(
        \Twig_Environment $twig
    ) {
        $this->twig = $twig;
    }

    /**
     * @return string
     */
    public function indexAction() : string
    {
        return $this->twig->render('index.twig');
    }
}
