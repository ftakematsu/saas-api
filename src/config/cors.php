<?php 

return [

    'paths' => [
        'api/*',
        'broadcasting/auth',
    ],

    'allowed_methods' => ['*'],

    'allowed_origins' => [
        'http://localhost:4200',
    ],

    'allowed_headers' => ['*'],

    'supports_credentials' => true,

];
