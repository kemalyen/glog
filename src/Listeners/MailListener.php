<?php
/**
 * Created by PhpStorm.
 * User: kemal.yenilmez
 * Date: 8/21/2017
 * Time: 11:02 AM
 */

namespace Gazatem\Glog\Listeners;

use Gazatem\Glog\Events\MailLog;
use Illuminate\Support\Facades\Mail;

class MailListener
{
    public function handle(MailLog $event)
    {
        Mail::send("glog::email.notification", $event->data, function ($message) {
            $message->to(config('glog.mail_to'))->subject(config('glog.mail_subject'));
        });
    }
}