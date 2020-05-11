<?php

namespace App\Http\Controllers;

use App\UserTransaction;
use Composer\DependencyResolver\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TransactionController extends Controller
{
    public function getTransactionsByUserId(int $userId)
    {
        $transactions = DB::table('users_transactions')->where('user_id','=',$userId)->get();

        return $transactions;
    }

    public function add(int $userId, string $type, float $amount)
    {
        $transaction = new UserTransaction();
        $transaction->user_id = $userId;
        $transaction->type = $type;
        $transaction->amount = $amount;

        try {
            $transaction->save();
        } catch (\Exception $exception) {
            Log::error('Transaction not saved:' . $exception->getMessage());
        }

    }
}
