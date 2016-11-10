<?php

namespace CodePress\CodeUser\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const ROLE_ADMIN = "Admin";
    const ROLE_EDITOR = "Editor";
    const ROLE_REDATOR = "Redator";

    protected $table = "app_roles";

    protected $fillable = [
        'name'
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
           'name' => 'required'
        ]);
        $validator->setData($this->getAttributes);

        if($validator->fails()){
            $this->errors = $validator->errors();
            return false;
        }

        return true;
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'app_user_roles', 'role_id', 'user_id');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'app_permissions_roles', 'role_id', 'permission_id');
    }

}