<?php
namespace Gazatem\Glog\Repositories;

interface RepositoryContract
{
    public function where($col, $value);
    public function whereDate($col, $value, $criteria);
    public function orderBy($value);
    public function get();
    public function find($id);

}
