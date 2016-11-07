<?php

namespace CodePress\CodeUser\Routing;

use Illuminate\Support\Facades\Route;

class Router{

/*
Route::group([
'prefix' => 'admin/posts',
'as' => 'admin.posts.',
'namespace'=>'CodePress\CodePost\Controllers',
'middleware' => ['web']
],
    function(){

        Route::get('', [ 'uses' => 'AdminPostController@index', 'as' => 'index']);
        Route::get('/create', [ 'uses' => 'AdminPostController@create', 'as' => 'create']);
        Route::post('/store', [ 'uses' => 'AdminPostController@store', 'as' => 'store']);
        Route::get('{id}/edit', [ 'uses' => 'AdminPostController@edit', 'as' => 'edit']);
        Route::put('{id}/update/', [ 'uses' => 'AdminPostController@update', 'as' => 'update']);

    });*/


    public function auth(){
        $namespace = "\\CodePress\\CodeUser\\Controllers";

        Route::group([
            'namespace' => null
        ], function () use($namespace){
            // Authentication Routes...
            Route::get('login', "$namespace\\Auth\\LoginController@showLoginForm");
            Route::post('login', "$namespace\\Auth\\LoginController@login");
            Route::post('logout', "$namespace\\Auth\\LoginController@logout");

            // Password Reset Routes...
            Route::get('password/reset', "$namespace\\Auth\\ForgotPasswordController@showLinkRequestForm");
            Route::post('password/email', "$namespace\\Auth\\ForgotPasswordController@sendResetLinkEmail");
            Route::get('password/reset/{token}', "$namespace\\Auth\\ResetPasswordController@showResetForm");
            Route::post('password/reset', "$namespace\\Auth\\ResetPasswordController@reset");
        });
    }
    /*
    public function auth(){
        $namespace = "\\CodePress\\CodeUser\\Controllers";

        Route::group([
            "prefix" => "admin/users",
            'as' => 'admin.users.',
            "namespace" => $namespace,
            'middleware' => ['web']

        ], function (){
            // Authentication Routes...
            Route::get('login', [ 'uses' => 'Auth\LoginController@showLoginForm', 'as' => 'showLoginForm'])->name('login');
            Route::post('login', [ 'uses' => 'Auth\LoginController@login', 'as' => 'login']);
            Route::post('logout', [ 'uses' => 'Auth\LoginController@logout', 'as' => 'logout'])->name('logout');

            // Password Reset Routes...
            Route::get('password/reset', [ 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm', 'as' => 'showLinkRequestForm']);
            Route::post('password/email', [ 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail', 'as' => 'sendResetLinkEmail']);
            Route::get('password/reset/{token}', [ 'uses' => 'Auth\ResetPasswordController@showResetForm', 'as' => 'showResetForm']);
            Route::post('password/reset', [ 'uses' => 'Auth\ResetPasswordController@reset', 'as' => 'reset']);
        });
    }*/

}