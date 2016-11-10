<?php

namespace CodePress\CodeUser\Repository;

use CodePress\CodeDatabase\AbstractRepository;
use CodePress\CodeUser\Models\Permission;


class PermissionRepositoryEloquent extends AbstractRepository implements PermissionRepositoryInterface
{
    public function model()
    {
        return Permission::class;
    }

    public function pluck($column, $key = null)
    {
        $this->applyCriteria();
        return $this->model->pluck($column,$key);
    }

}