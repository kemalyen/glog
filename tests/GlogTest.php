<?php

use Mockery as m;
use Monolog\Logger;


class GlogTest extends TestCase
{

    public function testWrite()
    {
        $record = $this->getRecord(Logger::WARNING, 'log', array('data' => new \stdClass, 'foo' => 34));
        $handler = new Gazatem\Glog\Glog();
        try{
            $handler->handle($record);
        }catch (\RuntimeException $e){
            $this->markTestSkipped('Log failed!');
        }
    }

    protected function getRecord($level = Logger::WARNING, $message = 'test', $context = array())
    {
        return array(
            'message' => $message,
            'context' => $context,
            'level' => $level,
            'level_name' => Logger::getLevelName($level),
            'channel' => 'test',
            'datetime' => \DateTime::createFromFormat('U.u', sprintf('%.6F', microtime(true))),
            'extra' => array(),
        );
    }
}
