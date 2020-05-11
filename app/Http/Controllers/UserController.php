<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function add(string $username, string $email, bool $permissions)
    {
        $newUser = new User();
        $newUser->name = $username;
        $newUser->email = $email;
        $newUser->permissions = $permissions;
        try {
            $newUser->save();
        } catch (\Exception $exception) {
            Log::error('User not saved:' . $exception->getMessage());
        }

        return true;
    }

    public function get(int $id)
    {
        $user = DB::table('users')->find($id);
        return $user->name;
    }

    public function randomUserName(int $length)
    {
        $chars = 'abcdefghijklmnopqrstuvwxyz';
        $name = '';
        for ($i = 0; $i < $length; $i++) {
            $index = rand(0, strlen($chars) - 1);
            $name .= $chars[$index];
        }
        return $name;
    }

    public function getTenLastUsers()
    {
        $users = User::query()->orderBy('created_at','DESC')->limit(10)->get();
        return $users;
    }
}
