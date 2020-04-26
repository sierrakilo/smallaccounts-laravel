@extends('layouts.app')

@section('content')
<div>
    @foreach($nominalAccounts as $nominalAccount)
    <div>{{ $nominalAccount->name }}</div>
    @endforeach
</div>
@endsection