<?php

namespace CodePress\CodeUser\Repository;

use CodePress\CodeDatabase\AbstractRepository;
use CodePress\CodeUser\Models\Role;


class RoleRepositoryEloquent extends AbstractRepository implements RoleRepositoryInterface
{

    /**
     * @var PermissionRepositoryInterface
     */
    private $permissionRepository;

    public function __construct(PermissionRepositoryInterface $permissionRepository)
    {
        parent::__construct();
        $this->permissionRepository = $permissionRepository;
    }

    public function model()
    {
        return Role::class;
    }

    public function addPermissions($id, array $permissions)
    {
        $model = $this->find($id);
        foreach ($permissions as $v) {
            $model->permissions()->save($this->permissionRepository->find($v));
        }
        return $model;
    }

    public function lists($column, $key = null)
    {
        $this->applyCriteria();
        return $this->model->lists($column,$key);
    }
}