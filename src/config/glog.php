<?php
return [
    'service' => 'remote',
    'remote_host'   => 'http://api.monitor.app',
    'api_key' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiIsImp0aSI6IjRmMWcyM2ExMmFhIn0.eyJpc3MiOiJodHRwOlwvXC9leGFtcGxlLmNvbSIsImF1ZCI6Imh0dHA6XC9cL2V4YW1wbGUub3JnIiwianRpIjoiNGYxZzIzYTEyYWEiLCJpYXQiOjE1MDcwMzQ1NzQsIm5iZiI6MTUwNzAzNDYzNCwiZXhwIjoxNTA3MDM4MTc0LCJjb21wYW55X2lkIjoiMiJ9.qaSyH_8m8vsmSfpoPq-C9eqSI3BTIPHoy7r8u9KISac',
    'auth' => 'true',
    'db_connection' => 'mysql',
    'levels' => ['EMERGENCY', 'ALERT', 'CRITICAL', 'ERROR', 'WARNING', 'NOTICE', 'INFO', 'DEBUG'],
    'channels' => ['blog-home', 'blog-post', 'blog-category', 'user-login'],
    'notification' => ['blog-post' => ['ERROR', 'NOTICE']],
    'mail_subject' => 'gLog notification mail',
    'mail_to' => env('MAIL_FROM'),
    'translations' => [
        'action.failed' => 'Action failed',
        'user.register' => 'A new user registered',
        'log' => 'LOG',
    ],
    'route-prefix' => 'logs',
];