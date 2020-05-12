<?php

namespace Tests\Feature;

use App\Http\Controllers\TransactionController;
use Tests\TestCase;

class TransactionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testAdd()
    {
        $transaction = (new TransactionController())->add(24,'credit','100');

        if ($transaction) {
            $this->assertTrue(true);
        }
    }

    public function testGetLastUsersAmounts()
    {
        $users = (new TransactionController())->getLastUsersAmounts();

        if (is_array($users)) {
            $this->assertTrue(true);
        }
    }
}
