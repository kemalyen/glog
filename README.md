## A Log Handler for Monolog and Laravel PHP Framework

Complete documentation can be found at [Wiki](https://github.com/gazatem/glog/wiki)

## Installation

Add the following to your composer.json and run `composer update`

```json
{
    "require": {
        "gazatem/glog": "dev-master"
    }
}
```

Don't forget to dump composer autoload

```php
composer dump-autoload
```

### Laravel 5.6 Installation Guide

I've upgraded the script and it's now suitable to use with Laraveş 5.6 Since you do not add `Gazatem\Glog\GlogServiceProvider::class,` to config. Bu you need some changes on logging config. 


Open config/logging.php and add following array item to configuration file:

```php
        'glog' => [
            'driver'  => 'monolog',
            'handler' => \Gazatem\Glog\Glog::class,
        ],
```

And later do not forget to modify stack and add glog to stack. That is first item of configuration:

```php
        'stack' => [
            'driver' => 'stack',
            'channels' => ['single', 'glog'],
        ],
```



### Laravel 5.4 and earlier versions Installation Guide

Open your config/app.php add following line in the providers array

```php
Gazatem\Glog\GlogServiceProvider::class
```

Additionally add the listener to your app/Providers/EventServiceProvider.php:

```php
        \Gazatem\Glog\Events\MailLog::class => [
            \Gazatem\Glog\Listeners\MailListener::class,
        ],
```

Then in your bootstrap/app.php add / update your Monolog configuration.

```php
$app->configureMonologUsing(function ($monolog) {
    $monolog->pushHandler(new \Gazatem\Glog\Glog());
});
```

Run following command to publish migration and configuration


```php
 php artisan vendor:publish --provider="Gazatem\Glog\GlogServiceProvider"
```

To create database tables, run migration:
```php
 php artisan migrate
```


Thats all now start to log the events.

Open config/glog.php file and update the settings.

### USAGE

Do not fotget to include Log to your class

```php
use Log;
```

And add log entry
```php
Log::info('user.register', ['message' => 'User Registration Controller', 'id' => 23, 'name' => 'John Doe', 'email' => 'john@example.com']);
```


### Links
[gazatem.com](https://www.gazatem.com)
