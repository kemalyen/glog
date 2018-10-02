<?php

namespace Gazatem\Glog\Repositories;


use Carbon\Carbon;
use Gazatem\Glog\Model\MySql\Log as MySqlLogger;
use Gazatem\Glog\Model\MongoDb\Log as MongoDbLogger;

class LogRepository extends BaseRepository
{

    protected $model;

    public function __construct()
    {
        if (config('glog.db_connection') == 'mongodb') {
            $this->model = new MongoDbLogger;
        } else {
            $this->model = new MySqlLogger;
        }
    }

    public function orderBy($value = 'created_at', $ascdesc = 'desc')
    {
        $this->model = $this->model->orderBy($value, $ascdesc);
        return $this;
    }

    public function get()
    {
        return $this->model->get();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function whereDate($col = 'created_at', $value, $criteria =  '>=')
    {
        $this->model = $this->model->where(function ($query) use ($col, $value, $criteria) {
            if ($value != null) {
                $value = Carbon::createFromFormat('Y-m-d', $value);
                $query->where($col, $criteria, $value);
            }
        });
        return $this;
    }

    public function where($col, $value)
    {
        $this->model = $this->model->where(function ($query) use ($col, $value) {
            if ($value != null) {
                $query->where($col, '=', $value);
            }
        });
        return $this;
    }

}
