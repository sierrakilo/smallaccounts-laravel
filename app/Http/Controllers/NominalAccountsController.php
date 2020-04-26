<?php

namespace App\Http\Controllers;

use App\Models\NominalAccount;
use Illuminate\Http\Request;

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
}
