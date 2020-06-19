@extends('layouts.app')

@section('content')
<div>
    <div class="text-2xl">{{ $nominalAccount->name }}</div>
    <div class="flex flex-row justify-between">
        <div>Opening Balance</div>
        
        <div>
            @if($nominalAccount->default == 'debit')
            {{ $balance }}
            @endif
        </div>
        <div>
            @if($nominalAccount->default == 'credit')
            {{ $balance }}
            @endif
        </div>

    </div>
    @foreach($transactions as $transaction)
    <div class="flex flex-row justify-between">
        <div>{{ $transaction->credit_nominal_account_id == $nominalAccount->id ? $transaction->debit_nominal_account->name : $transaction->credit_nominal_account->name }}</div>
        
        <div>
            @if($transaction->debit_nominal_account_id == $nominalAccount->id)
                {{ $transaction->amount }}
            @endif
        </div>
        <div>
            @if($transaction->credit_nominal_account_id == $nominalAccount->id)
                {{ $transaction->amount }}
            @endif
        </div>

    </div>
    @endforeach
</div>

@endsection