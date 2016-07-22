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

Open your config/app.php add following line in the providers array

```php
Gazatem\Glog\GlogServiceProvider::class
```

Then in your bootstrap/app.php add / update your Monolog configiuration.

```php
$app->configureMonologUsing(function ($monolog) {
    $monolog->pushHandler(new \Gazatem\Glog\Glog());
});
```


Run following command to publish migration and configuration


```php
 php artisan vendor:publish
```


```php
 php artisan migrate
```




Open config/glog.php file and update the settings.

#USAGE

Do not fotget to include Log to your class

```php
use Log;
```

And add log entry
```php
Log::info('user.register', ['message' => 'User Registration Controller', 'id' => 23, 'name' => 'John Doe', 'email' => 'john@example.com']);
```


## Links
[gazatem.com](https://www.gazatem.com)
