<?php
namespace Gazatem\Glog\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

abstract class BaseRepository implements RepositoryContract
{
    protected $query;
    protected $model;

    /**
     * BaseRepository constructor.
     * @param Model $model
     */
    public function __construct()
    {
        $this->model = null;
    }

    abstract public function whereDate($col, $value);
    abstract public function where($col, $value);
    abstract public function find($id);
}
