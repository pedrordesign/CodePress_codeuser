<?php

namespace CodePress\CodeUser\Listener;

use Illuminate\Support\Facades\Event;

class TestEventListener{

    public function numero1(){
        echo 'numero 1';
    }
    public function numero2(){
        echo 'numero 2';
    }

    public function subscribe($events){
        Event::listen('TestEventListener\Numero1', '\CodePress\CodeUser\Listener\TestEventListener@numero1', 1);
        Event::listen('TestEventListener\Numero1', '\CodePress\CodeUser\Listener\TestEventListener@numero2', 2);
    }

}