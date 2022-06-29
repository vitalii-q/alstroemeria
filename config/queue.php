<?php

return [
    'connection' => \engine\Helper\Env::get('QUEUE_CONNECTION', 'database'),

    'connections' => [
        'database' => [
            'driver' => 'database',
            'table' => 'jobs',
        ],
    ]
];
