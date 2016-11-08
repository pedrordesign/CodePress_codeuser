<?php

namespace CodePress\CodeUser\Repository;

use CodePress\CodeDatabase\AbstractRepository;
use CodePress\CodeUser\Event\UserCreatedEvent;
use CodePress\CodeUser\Models\User;

class UserRepositoryEloquent extends AbstractRepository implements UserRepositoryInterface
{
    public function create(array $data)
    {
        $password = $data['password'];
        $data['password'] = bcrypt($password);
        $result = parent::create($data);
        //event(new UserCreatedEvent($result, $password));
        event('TestEventListener\Numero1', ['Olha o Evento 1 Ai ->>>>>>>>>>>>>>>>>   ']);
        event('event.numero2', ['Olha o Evento 2 Ai ->>>>>>>>>>>>>>>>>   ']);
        return $result;
    }


    public function model()
    {
        return User::class;
    }

}