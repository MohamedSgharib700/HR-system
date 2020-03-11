<?php

namespace App\Repositories;

use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;

class TransactionRepository
{

    /**
     * @param $request
     * @return $this|mixed
     */
    public function search(Request $request)
    {
        $transaction = Transaction::orderByDesc("id")
            ->when($request->has('type'), function ($transaction) use ($request) {
                return $transaction->where('type', '=', (int)$request->get('type'));
            })
            ->when($request->get('machine_code'), function ($transaction) use ($request) {
                return $transaction->where('machine_code', '=', $request->query->get('machine_code'));
            })
            ->when($request->get('trans_date'), function ($transaction) use ($request) {
                return $transaction->where('trans_date', '=', $request->query->get('trans_date'));
            });
        return $transaction;
    }

}
