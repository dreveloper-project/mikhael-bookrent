@extends('layouts.mainlayout')
@section('title', 'Welcome To Dashboard')

@section('content')
<h1>Rent Logs Detail</h1>
<div class="mt-5">
    <x-rent-log-table :rentlogs='$rentlogs' />
</div>
@endsection