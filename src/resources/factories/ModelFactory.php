<?php

use CodePress\CodeUser\Models\User;

$factory->define(User::class, function (Faker\Generator $faker){
   return [
       'name' => 'user',
       'email' => 'email@user.com.br',
       'password' => bcrypt(123456),
       'active' => true,
       'remember_token' => str_random(10)
   ] ;
});