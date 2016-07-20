<?php
namespace Gazatem\Glog;

use Exception;

class OutputGenerator{

  static function get_message($logMessage){
    try{
      $logMessage = json_decode($logMessage);
      if (isset($logMessage->message)){
        echo $logMessage->message;
      }elseif (is_array($logMessage)){
        echo $logMessage[0];
      }else{
          echo $logMessage;
      }
    }catch(Exception $ex){
       echo $ex->getMessage();
    }
  }
}
