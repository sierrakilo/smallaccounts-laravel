<?php

namespace App\Traits;

use App\Models\NominalAccount;
use App\Models\NominalTransaction;

trait NominalTrait
{
    public function nominalTrialBalance()
    {
        $nominalAccounts = NominalAccount::all();

        $nominalTransactions = NominalTransaction::all();

        foreach($nominalTransactions as $keyT => $nominalTransaction) {
            foreach($nominalAccounts as $keyA => $nominalAccount) {

                if($nominalTransaction->debit_nominal_account_id == $nominalAccount->id) {
                    
                    if($nominalAccount->default == 'debit') {
                        $nominalAccounts[$keyA]->amount += $nominalTransaction->amount;
                    } else {
                        $nominalAccounts[$keyA]->amount -= $nominalTransaction->amount;
                    }
                }

                if($nominalTransaction->credit_nominal_account_id == $nominalAccount->id) {
                    if($nominalAccount->default == 'credit') {
                        $nominalAccounts[$keyA]->amount += $nominalTransaction->amount;
                    } else {
                        $nominalAccounts[$keyA]->amount -= $nominalTransaction->amount;
                    }
                }

            }
        }



        // $collection = collect([1, 2, 3, 4]);

        $debit = $nominalAccounts->filter(function ($value, $key) {
            return $value['default'] == 'debit';
        });
        $sumDebit = $debit->sum('amount');

        $credit = $nominalAccounts->filter(function ($value, $key) {
            return $value['default'] == 'credit';
        });
        $sumCredit = $credit->sum('amount');

        return [
            $nominalAccounts,
            $sumDebit,
            $sumCredit,
        ];

    }

    public function accountActivity(NominalAccount $nominalAccount)
    {
        $dt = $nominalAccount->debit_nominal_transactions;
        $ct = $nominalAccount->credit_nominal_transactions;

        $t = $dt->merge($ct);

        return [
            $nominalAccount->amount,
            $t
        ];
    }
}