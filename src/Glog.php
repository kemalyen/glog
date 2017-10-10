<?php

namespace Gazatem\Glog;

use Gazatem\Glog\Events\MailLog;
use Gazatem\Glog\Model\Logger;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Handler\Curl\Util;

class Glog extends AbstractProcessingHandler
{
    private $httpConnection = null;

    protected function write(array $record)
    {
        $hasLevel = in_array($record['level_name'], config('glog.levels'));
        $hasChannel = in_array($record['message'], config('glog.channels'));

        $notifications = config('glog.notification');

        $send_notification = 0;
        foreach ($notifications as $key => $value) {
            if ($key === $record['message']) {
                $send_notification = in_array($record['level_name'], $value);
            }
        }

        if ($send_notification) {
            $messages = config('glog.messages');
            $data = ['record' => $record, 'action' => (isset($messages[$record['message']]) ? $messages[$record['message']] : $record['message'])];
            event(new MailLog($data));
        }

        if ($hasLevel && $hasChannel) {
            if (config('glog.service', 'local') === 'remote') {
                $this->post_remote($record);
            } else {
                $logger = new Logger((config('glog.db_connection') == 'mysql') ? Model\MySql\Log::class : Model\MongoDb\Log::class);
                $logger->create([
                    'channel' => $record['message'],
                    'context' => json_encode($record['context']),
                    'level' => $record['level'],
                    'level_name' => $record['level_name'],
                ]);
            }
        }
    }

    private function post_remote(array $record)
    {
        $date = $record['datetime'];

        $data = array('time' => $date->format('Y-m-d\TH:i:s.uO'));
        unset($record['datetime']);

        if (isset($record['context']['type'])) {
            $data['type'] = $record['context']['type'];
            unset($record['context']['type']);
        } else {
            $data['type'] = $record['channel'];
        }

        $data['data'] = $record['context'];
        $data['level'] = $record['level'];
        $data['level_name'] = $record['level_name'];
        $data['message'] = $record['message'];

        $postString = json_encode($data);
        $this->writeHttp($postString);
    }

    private function writeHttp($data)
    {
        if (!$this->httpConnection) {
            $this->connectHttp();
        }

        curl_setopt($this->httpConnection, CURLOPT_POSTFIELDS, $data);
        curl_setopt($this->httpConnection, CURLOPT_HTTPHEADER, array(
                "Authorization: Bearer " . config('glog.api_key', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiIsImp0aSI6IjRmMWcyM2ExMmFhIn0.eyJpc3MiOiJodHRwOlwvXC9leGFtcGxlLmNvbSIsImF1ZCI6Imh0dHA6XC9cL2V4YW1wbGUub3JnIiwianRpIjoiNGYxZzIzYTEyYWEiLCJpYXQiOjE1MDcwMzQ1NzQsIm5iZiI6MTUwNzAzNDYzNCwiZXhwIjoxNTA3MDM4MTc0LCJjb21wYW55X2lkIjoiMiJ9.qaSyH_8m8vsmSfpoPq-C9eqSI3BTIPHoy7r8u9KISac'),
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            )
        );

        Util::execute($this->httpConnection, 5, false);
    }

    /**
     * Establish a connection to a http server
     */
    protected function connectHttp()
    {
        if (!extension_loaded('curl')) {
            throw new \LogicException('The curl extension is needed to use http URLs');
        }

        $this->httpConnection = curl_init(config('glog.remote_host', 'http://test.gazatem.com'));

        if (!$this->httpConnection) {
            throw new \LogicException('Unable to connect to ' . config('glog.remote_host', 'http://test.gazatem.com'));
        }

        curl_setopt($this->httpConnection, CURLOPT_POST, "POST");
        curl_setopt($this->httpConnection, CURLOPT_RETURNTRANSFER, true);
    }

}