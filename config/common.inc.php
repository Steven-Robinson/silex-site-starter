<?php

return [
    'config' => [
        'Env'  => 'production',
        'twig' => [
            'twig.path' => __DIR__ . '/../resources/views',
        ],
        'routes' => [
            '/' => 'home.controller:indexAction',
        ],
    ],
    'debug'  => false,
];
