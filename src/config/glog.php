<?php
return [

    // Choose your service: local or remote
    // we allow you run glog local with limited features 
    // if you wish to use our service enter 'remote' in service option
    // and your api key
    // To get your api key, browse to www.loggfy.com

    'service' => env('GLOG_SERVICE', 'remote'), 

    // if you will run glog on local need to update these settings
    'middlewares' => ['web', 'auth', 'App\Http\Middleware\LogAccess'],
    'db_connection' => env('DB_CONNECTION', 'mysql'),
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

    // For hosted version, enter your api key 
    'api_key'   => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiIsImp0aSI6IjRmMWcyM2ExMmFhIn0.eyJpc3MiOiJodHRwOlwvXC9leGFtcGxlLmNvbSIsImF1ZCI6Imh0dHA6XC9cL2V4YW1wbGUub3JnIiwianRpIjoiNGYxZzIzYTEyYWEiLCJpYXQiOjE1MTIyOTE2ODMsIm5iZiI6MTUxMjI5MTc0MywiY29tcGFueV9pZCI6IjEifQ.jq0__JqOQJZwAchM7duBwEwh_F-lvEPB_dN349ThHiU',
];
