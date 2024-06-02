@extends('layouts.mainlayout')
@section('title', 'Dashboard')

@section('content')
<h2>Are you sure to ban user {{$user->username}} ?</h2>
<div class="mt-5">
    <a href="/user-destroy/{{ $user->slug }}" class="btn btn-danger">Sure</a>
    <a href="/users" class="btn btn-primary">Cancel</a>
</div>
@endsection