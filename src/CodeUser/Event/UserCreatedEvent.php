<?php

namespace CodePress\CodeUser\Event;

class UserCreatedEvent{

    private $user;

    private $plainPassword;

    /**
     * @return mixed
     */
    public function __construct($user, $plainPassword){
        $this->user = $user;
        $this->plainPassword = $plainPassword;
    }

    /**
     * @return mixed
     */
    public function getUser(){
        return $this->user;
    }

    /**
     * @return mixed
     */
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    /**
     * @param mixed $plainPassword
     */
    public function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;
    }

}