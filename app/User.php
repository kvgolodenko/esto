<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    public function transactions()
    {
        return $this->hasMany('App\UserTransaction');
    }

    public function createAdmin(string $name, string $email, int $permissions)
    {
        $this->name = $name;
        $this->email = $email;
        $this->permissions = $permissions;
        $this->save();
    }
}
