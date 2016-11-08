<?php

namespace CodePress\CodeUser\Routing;

use Illuminate\Support\Facades\Route;

class Router{


    public function auth(){

        $namespace = "\\CodePress\\CodeUser\\Controllers";

        Route::group([
            'namespace' => null
            //'namespace' => '\\CodePress\\CodeUser\\Controllers'
        ], function () use($namespace){
                // Authentication Routes...
                Route::get('login', "$namespace\\Auth\\LoginController@showLoginForm")->name('login');
                Route::post('login', "$namespace\\Auth\\LoginController@login");
                Route::post('logout', "$namespace\\Auth\\LoginController@logout")->name('logout');

                // Registration Routes...
                Route::get('register', "$namespace\\Auth\\RegisterController@showRegistrationForm");
                Route::post('register', "$namespace\\Auth\\RegisterController@register");

                // Password Reset Routes...
                Route::get('password/reset', "$namespace\\Auth\\ForgotPasswordController@showLinkRequestForm");
                Route::post('password/email', "$namespace\\Auth\\ForgotPasswordController@sendResetLinkEmail");
                Route::get('password/reset/{token}', "$namespace\\Auth\\ResetPasswordController@showResetForm");
                Route::post('password/reset', "$namespace\\Auth\\ResetPasswordController@reset");
        });

    }

}