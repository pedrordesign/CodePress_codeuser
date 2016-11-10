<?php

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => '\CodePress\CodeUser\Controllers',
    'middleware' => ['web', 'auth']
], function () {

    Route::group(['prefix' => 'users', 'as' => 'users.'],function(){
        Route::get('/', ['uses' => 'Admin\AdminUserController@index', 'as' => 'index']);
        Route::get('/create', ['uses' =>'Admin\AdminUserController@create', 'as' => 'create']);
        Route::post('/store', ['uses' =>'Admin\AdminUserController@store', 'as' => 'store']);
        Route::get('{id}/edit', ['uses' =>'Admin\AdminUserController@edit', 'as' => 'edit']);
        Route::put('{id}/update', ['uses' =>'Admin\AdminUserController@update', 'as' => 'update']);
    });

    Route::group(['prefix' => 'roles', 'as' => 'roles.'],function(){
        Route::get('/', ['uses' => 'Admin\RolesController@index', 'as' => 'index']);
        Route::get('/create', ['uses' =>'Admin\RolesController@create', 'as' => 'create']);
        Route::post('/store', ['uses' =>'Admin\RolesController@store', 'as' => 'store']);
        Route::get('{id}/edit', ['uses' =>'Admin\RolesController@edit', 'as' => 'edit']);
        Route::put('{id}/update', ['uses' =>'Admin\RolesController@update', 'as' => 'update']);
    });

    Route::group(['prefix' => 'permissions', 'as' => 'permissions.'],function(){
        Route::get('/', ['uses' => 'Admin\PermissionsController@index', 'as' => 'index']);
        Route::get('/view', ['uses' =>'Admin\PermissionsController@view', 'as' => 'show']);
    });

});