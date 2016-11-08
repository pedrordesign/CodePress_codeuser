<?php

namespace CodePress\CodeUser\Facade;

use Illuminate\Support\Facades\Facade;

class Route extends Facade{

    protected static function getFacadeAccessor(){
        return 'custom_router';
    }

}