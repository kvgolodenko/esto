<?php

namespace Tests\Feature;

use App\Http\Controllers\TransactionController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
        $transaction = (new TransactionController())->add(1,'debit','100');

        if ($transaction) {
            $this->assertTrue(true);
        }
    }
}
