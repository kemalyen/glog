<?php
namespace Gazatem\Glog\Repositories;

interface RepositoryContract
{
    public function count();
    public function get(array $columns = ['*']);
    public function getById($id, array $columns = ['*']);
    public function getByColumn($item, $column, array $columns = ['*']);
    public function paginate($limit = 25, array $columns = ['*'], $pageName = 'page', $page = null);
    public function limit($limit);
    public function orderBy($column, $value);
    public function where($column, $value, $operator = '=');
    public function whereIn($column, $value);
}
