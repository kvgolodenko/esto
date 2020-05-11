<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

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

        try {
            $this->save();
        } catch (\Exception $exception) {
            Log::error('Admin not saved:' . $exception->getMessage());
        }
    }
}
