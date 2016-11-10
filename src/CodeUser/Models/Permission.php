<?php

namespace CodePress\CodeUser\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{

    protected $table = "app_permissions";

    protected $fillable = [
        'name',
        'description'
    ];

    private $validator;

    public function setValidator()
    {
        return $this->validator;
    }

    public function isValid()
    {
        $validator = $this->validator;
        $validator->setRules([
            'name' => 'required',
            'description' => 'required'
        ]);
        $validator->setData($this->getAttributes);

        if($validator->fails()){
            $this->errors = $validator->errors();
            return false;
        }

        return true;
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'app_permissions_roles', 'permission_id', 'role_id');
    }

}