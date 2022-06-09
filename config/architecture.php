<?php

return [
    'DI' => [
        app\Engine\DIProviders\DatabaseProvider::class,
        app\Engine\DIProviders\ViewProvider::class,
        app\Engine\DIProviders\RouterProvider::class,
    ],

    'Services' => [
        'View' => [
            'DataProvider' => app\Services\View\DataProvider::class,
        ]
    ]
];