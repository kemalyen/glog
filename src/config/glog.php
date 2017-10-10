<?php
return [
    'service' => 'local',
    'middlewares' => ['web', 'auth', 'App\Http\Middleware\LogAccess'],
    'remote_host'   => 'http://api.monitor.app',
    'db_connection' => 'mysql',
    'levels' => ['EMERGENCY', 'ALERT', 'CRITICAL', 'ERROR', 'WARNING', 'NOTICE', 'INFO', 'DEBUG'],
    'channels' => ['blog-home', 'blog-post', 'blog-category', 'user-login'],
    'notification' => [],
    'mail_subject' => 'gLog notification mail',
    'mail_to' => env('MAIL_FROM'),
    'translations' => [
        'action.failed' => 'Action failed',
        'user.register' => 'A new user registered',
        'log' => 'LOG',
    ],
    'route-prefix' => 'logs',
];
