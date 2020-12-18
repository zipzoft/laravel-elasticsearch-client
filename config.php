<?php

return [
    'hosts' => [
        [
            'host' => env('ELASTIC_HOST', 'localhost:9200'),
            'port' => env('ELASTIC_PORT', 9200),
            'scheme' => env('ELASTIC_SCHEME', 'https'),
            'user' => env('ELASTIC_USER'),
            'pass' => env('ELASTIC_PASS'),
        ]
    ]
];
