<?php
return [

    // Choose your service: local or remote
    // we allow you run glog local with limited features 
    // if you wish to use our service enter 'remote' in service option
    // and your api key
    // To get your api key, browse to www.loggfy.com

    'service' => env('GLOG_SERVICE', 'remote'), 



    // #########################################################
    // L O C A L  S E T T I N G S
    //
    // if you will run glog on local need to update these settings

    // Secure your log panel
    'middlewares' => ['web', 'auth', 'App\Http\Middleware\LogAccess'],

    // glog uses mysql default, but can be choose mongodb
    'db_connection' => env('DB_CONNECTION', 'mysql'),

    // To create an alert, enter level and channel pair here
    // Example: 'notification' => ['test-channel' => ['CRITICAL', 'ALERT']],
    'notification' => [],
    'mail_subject' => 'gLog notification mail',
    'mail_to' => env('MAIL_FROM'),
    'translations' => [
        'test-channe' => 'A sample channel'
    ],

    // Panel route path
    'route-prefix' => 'logs-panel',



    // #########################################################
    // R E M O T E  S E R V I C E
    //
    // For hosted version, enter your api key 
    'api_key'   => '',


    // Common settings!

    // All channels must be entered before to send the API. 
    'levels' => ['EMERGENCY', 'ALERT', 'CRITICAL', 'ERROR', 'WARNING', 'NOTICE', 'INFO', 'DEBUG'],
    'channels' => ['test-channel'],    
];
