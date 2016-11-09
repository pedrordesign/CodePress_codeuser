<?php

namespace CodePress\CodeUser\Repository;

use CodePress\CodeDatabase\AbstractRepository;
use CodePress\CodeUser\Event\UserCreatedEvent;
use CodePress\CodeUser\Models\User;

class UserRepositoryEloquent extends AbstractRepository implements UserRepositoryInterface
{

    /**
     * @var RoleRepositoryInterface
     */
    private $roleRepository;

    public function __construct(RoleRepositoryInterface $roleRepository)
    {
        parent::__construct();
        $this->roleRepository = $roleRepository;
    }

    public function create(array $data)
    {
        $password = $data['password'];
        $data['password'] = bcrypt($password);
        $result = parent::create($data);
        event(new UserCreatedEvent($result, $password));
        //event('TestEventListener\Numero1', ['Olha o Evento 1 Ai ->>>>>>>>>>>>>>>>>   ']);
        //event('event.numero2', ['Olha o Evento 2 Ai ->>>>>>>>>>>>>>>>>   ']);
        return $result;
    }


    public function model()
    {
        return User::class;
    }

    public function addRoles($id, array $roles)
    {
        $model = $this->find($id);
        foreach ($roles as $v) {
            $model->roles()->save($this->roleRepository->find($v));
        }
        return $model;
    }

}