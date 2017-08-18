<?php
/**
 * Created by PhpStorm.
 * User: kemal.yenilmez
 * Date: 8/18/2017
 * Time: 4:42 PM
 */

namespace Gazatem\Glog\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Gazatem\Glog\Events\MailLog;

class MailListeners implements ShouldQueue
{
    use InteractsWithQueue;

    public function __construct()
    {
    }

    public function handle(MailLog $event)
    {
        if (true) {
            $this->release(30);
        }
    }
}