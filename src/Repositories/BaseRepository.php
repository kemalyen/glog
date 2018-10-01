<?php
namespace Gazatem\Glog\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

abstract class BaseRepository implements RepositoryContract
{
    protected $query;
    protected $model;
}
