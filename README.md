## A Log Handler and Log Analysis Tool for Laravel PHP Framework

  

Glog helps your team monitoring your application log. Glog works with Monolog to handle the logs. But with a custom configuration,

you can save logs to database using custom rules and channels. Custom channel and log levels triggers the log alerting system and send alerts to target email addresses.


Also Glog provides a custom administrator panel to analyze the logs. Panel uses Laravel main authentication system, so you do not need to protect log control panel.
  

Glog supports MongoDB and mySQL. If your project needs to store more logs, you may use MongoDB. For small projects, mysql is enough to manage the logs.

  

Complete documentation can be found at [Wiki](https://github.com/gazatem/glog/wiki)

  

## Installation

  

To get started, use Composer to add the package to your project's dependencies:

  

```bash

  

composer require gazatem/glog

  

```

  
  

### Laravel 5.8 Installation Guide (includes 5.5 and newer versions)

  

If you're using a later version of Laravel 5.5, service provider  will automatically get registered. For older versions you need to do it your self.  


Open config/logging.php and add following array item to configuration file:

  

```php

'glog'  => [

'driver'  =>  'monolog',

'handler'  =>  \Gazatem\Glog\Glog::class,

],

```

  

And later do not forget to modify stack and add glog to stack. That is first item of configuration:

  

```php

'stack'  => [

'driver'  =>  'stack',

'channels'  => ['single', 'glog'],

],

```


  
### Laravel 5.4 and earlier versions Installation Guide

  

Open your config/app.php add following line in the providers array

  

```php

Gazatem\Glog\Providers\GlogServiceProvider::class

```

  
Then in your bootstrap/app.php add / update your Monolog configuration.

  

```php

$app->configureMonologUsing(function ($monolog) {

$monolog->pushHandler(new \Gazatem\Glog\Glog());

});

```
  
### Mail Alert System 

Additionally add the listener to your app/Providers/EventServiceProvider.php:

  

```php

\Gazatem\Glog\Events\MailLog::class  => [

\Gazatem\Glog\Listeners\MailListener::class,

],

```

  


   

  
  
  



  
  
  
### Publish settings



Run following command to publish migration and configuration

  
  

```php

php  artisan  vendor:publish  --provider="Gazatem\Glog\Providers\GlogServiceProvider"

```

 ### Migration 

To create database tables, run migration:

```php

php  artisan  migrate

```

  
  

That's all now, now let's start to log the events.

  
###  Configuration

All system configuration is under config folder inside glog.php file. This file simply store system configuration. Add custom channels, update database and route of the control panel.

```php
<?php

return [

  // No need to change it now, thats for future releases!

'service'  =>  env('GLOG_SERVICE', 'local'),

  
  
  
  

// Secure your log panel

'middlewares'  => ['web', 'App\Http\Middleware\LogAccess'],

  

// glog uses mysql default, but can be choose mongodb

'db_connection'  =>  env('DB_CONNECTION', 'mysql'),

  

// To create an alert, enter level and channel pair here

// Example: 'notification' => ['test-channel' => ['CRITICAL', 'ALERT']],

'notification'  => [],

'mail_subject'  =>  'Glog notification mail',

'mail_to'  =>  env('MAIL_FROM'),

'translations'  => [

'test-channel'  =>  'A sample channel'

],

  

// Panel route path

'route-prefix'  =>  'logs-panel',

  

// All channels must be entered before to send the API.

'levels'  => ['EMERGENCY', 'ALERT', 'CRITICAL', 'ERROR', 'WARNING', 'NOTICE', 'INFO', 'DEBUG'],

'channels'  => ['test-channel', 'user.register'],

];
```
  

### Usage

  

Do not fotget to include Log to your class.

  

```php

use  Log;

```

  

And add some log entries:

```php

Log::info('user.register', ['message' => 'User Registration Controller', 'id' => 23, 'name' => 'John Doe', 'email' => 'john@example.com']);

```

  
  

### Links

[gazatem.com](https://www.gazatem.com)