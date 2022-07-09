<?php

/**
 * application services architecture
 */

return [
    'DI' => [
        engine\DIProviders\DatabaseProvider::class,
        engine\DIProviders\ViewProvider::class,
        engine\DIProviders\RouterProvider::class,
    ],

    'Services' => [
        'View' => [
            'DataProvider' => app\Services\View\DataProvider::class,
            'Middleware' => app\Services\View\Middleware::class,
        ]
    ],

    'Middleware' => [
        'AuthFacade' => app\Middleware\Auth::class,
    ]
];