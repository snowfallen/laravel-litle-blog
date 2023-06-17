<?php

return [
    'endpoint' => [
        'localhost' => [
            'host' => env('SOLR_HOST'),
            'port' => env('SOLR_PORT'),
            'path' => env('SOLR_PATH'),
            'core' => env('SOLR_CORE'),
        ]
    ]
];
