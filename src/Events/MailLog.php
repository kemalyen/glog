<?php
/**
 * Created by PhpStorm.
 * User: kemal.yenilmez
 * Date: 8/18/2017
 * Time: 4:41 PM
 */

namespace Gazatem\Glog\Events;

use Illuminate\Queue\SerializesModels;

class MailLog
{
    use SerializesModels;

    public function __construct()
    {

    }
}