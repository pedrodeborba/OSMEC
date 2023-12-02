<?php
return [

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'person',
        ],
    
        'api' => [
            'driver' => 'jwt',
            'provider' => 'person',
        ],
    ],

    'providers' => [
        'person' => [
            'driver' => 'eloquent',
            'model' => App\Models\Person::class,
        ],
    ],

    'passwords' => [
        'person' => [
            'provider' => 'person',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,
];