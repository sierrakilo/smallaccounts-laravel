@extends('layouts.app')

@section('content')
<div class="flex flex-col p-2">
    @foreach($nominalAccounts as $nominalAccount)
    <div>{{ $nominalAccount->name }}</div>
    @endforeach
</div>
@endsection