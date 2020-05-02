<?php

namespace App\Http\Controllers;

use App\Models\NominalAccount;
use App\Models\NominalTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class NominalAccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nominalAccounts = NominalAccount::all();

        return view('nominal_accounts/index', [
            'nominalAccounts' => $nominalAccounts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NominalAccount  $nominalAccount
     * @return \Illuminate\Http\Response
     */
    public function show(NominalAccount $nominalAccount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NominalAccount  $nominalAccount
     * @return \Illuminate\Http\Response
     */
    public function edit(NominalAccount $nominalAccount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NominalAccount  $nominalAccount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NominalAccount $nominalAccount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NominalAccount  $nominalAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(NominalAccount $nominalAccount)
    {
        //
    }

    public function trialBalance()
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




        // $sumDebit = $nominalAccounts->sum('debit');
        // $sumCredit = $nominalAccounts->sum('credit');

        return view('nominal_accounts/trial_balance', [
            'nominalAccounts' => $nominalAccounts,
            'sumDebit' => $sumDebit,
            'sumCredit' => $sumCredit
        ]);
    }
}
