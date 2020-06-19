<?php

namespace App\Http\Controllers;

use App\Models\NominalAccount;
use App\Models\NominalTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Traits\NominalTrait;

class NominalAccountsController extends Controller
{
    use NominalTrait;

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

    /**
     * trialBalance
     */
    public function trialBalance()
    {
        list($nominalAccounts, $sumDebit, $sumCredit) = $this->nominalTrialBalance();

        return view('nominal_accounts.trial_balance', [
            'nominalAccounts' => $nominalAccounts,
            'sumDebit' => $sumDebit,
            'sumCredit' => $sumCredit
        ]);
    }

    public function activity(NominalAccount $nominalAccount)
    {
        list ($balance, $transactions) = $this->accountActivity($nominalAccount);

        return view('nominal_accounts.activity', [
            'nominalAccount' => $nominalAccount,
            'balance' => $balance,
            'transactions' => $transactions
        ]);
    }
}
