<?php


return [

    'service' => 'local',

    'db_connection' => 'mysql',

    'levels' => ['EMERGENCY', 'ALERT', 'CRITICAL', 'ERROR', 'WARNING', 'NOTICE', 'INFO', 'DEBUG'],

    'channels' => ['log', 'user.register', 'user.login', 'user.activation', 'action.failed'],

    'notification' => ['user.fail' => ['CRITICAL', 'ALERT'], 'user.register' => ['NOTICE'], 'user.login' => ['NOTICE'],],

    'mail_subject' => 'gLog notification mail',

    'mail_to' => env('MAIL_FROM'),
    'translations' => [
        'action.failed' => 'Action failed',
        'user.register' => 'A new user registered',
        'log' => 'LOG',
    ],
    'route-prefix' => 'logs',
];


