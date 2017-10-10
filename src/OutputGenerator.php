<?php

namespace Gazatem\Glog;

use Exception;

class OutputGenerator
{

    static function get_message($logMessage)
    {
        try {
            $logs = json_decode($logMessage, true);

            foreach ($logs as $key => $value) {
                if (is_array($value)) {
                    echo "<strong>". ucfirst($key) .":</strong><br/>";
                    echo "<blockquote>";
                    self::parse($value);
                    echo "</blockquote>";
                } else {
                    echo $key . ': ' . $value . '<br/>';
                }
            }

        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    static function parse($logs)
    {
        foreach ($logs as $key => $value) {
            if (is_array($value)) {
                echo "<strong>". ucfirst($key) .":</strong><br/>";
                echo "<blockquote>";
                self::parse($value);
                echo "</blockquote>";

            } else {
                echo $key . ': ' . $value . '<br/>';
            }
        }
    }
}
