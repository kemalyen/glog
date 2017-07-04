<?php

namespace Gazatem\Glog\Model;

class Logger
{
    private $model;

    function __construct($model = null)
    {
        $this->model = $model;
    }

    public function create($dbLogData = [])
    {
        $this->model::create($dbLogData);
    }
}