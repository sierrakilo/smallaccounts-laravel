@extends('layouts.app')

@section('content')
<div class="flex flex-col p-2">
    <div class="p-6 bg-gray-200">Trial Balance</div>
    <div class="flex flex-row">
        <div class="flex-grow p-4">Nominal Account</div>
        <div class="flex-none p-4 w-32 text-right">Debit (£)</div>
        <div class="flex-none p-4 w-32 text-right">Credit (£)</div>
    </div>
    @foreach($nominalAccounts as $nominalAccount)
    <div class="flex flex-row">
        <div class="flex-grow p-4">{{ $nominalAccount->name }}</div>
        @if($nominalAccount->default == 'credit')
        <div class="flex-none p-4 w-32 text-right">&nbsp;</div>
        @endif
        <div class="flex-none p-4 w-32 text-right">@money($nominalAccount->amount)</div>
        @if($nominalAccount->default == 'debit')
        <div class="flex-none p-4 w-32 text-right">&nbsp;</div>
        @endif
    </div>
    @endforeach
    <div class="flex flex-row">
        <div class="flex-grow p-4">&nbsp;</div>
        <div class="flex-none p-4 w-32 text-right font-bold">@money($sumDebit)</div>
        <div class="flex-none p-4 w-32 text-right font-bold">@money($sumCredit)</div>
    </div>
</div>
@endsection