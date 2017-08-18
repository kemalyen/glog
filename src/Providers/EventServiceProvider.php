<?php
/**
 * Created by PhpStorm.
 * User: kemal.yenilmez
 * Date: 8/18/2017
 * Time: 4:53 PM
 */

namespace Gazatem\Glog\Providers;


use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        'Gazatem\Glog\Events\MailLog' => [
            'Gazatem\Glog\Listeners\MailListener',
        ],
    ];

}