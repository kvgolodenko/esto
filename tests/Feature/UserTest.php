<?php

namespace Tests\Feature;

use App\Http\Controllers\UserController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetUsers()
    {
        $response = $this->get('/');
        $db = DB::connection('mysql');
        $result = $db->select('SELECT * FROM users');
        $response->assertStatus(200);
    }

    public function testAddUser()
    {
        $userController = new UserController();
        $name = $userController->randomUserName(10);
        $email = $name . '@esto.com';
        $permissions = 0;

        if ($userController->add($name,$email, $permissions)) {
            $this->assertTrue(true);
        }
    }

    public function testGetTenLastUsers()
    {
        $users = (new UserController())->getTenLastUsers();
        if ($users) {
            $this->assertTrue(true);
        }
    }
}
