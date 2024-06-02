@extends('layouts.mainlayout')
@section('title', 'Detail User')

@section('content')
<h1>Detail Users</h1>
<div class="mt-5 d-flex justify-content-end">
    @if ($user->status == 'inactive')
    <a href="/user-approve/{{ $user->slug }}" class="btn btn-info me-4">Approve User</a>
    @endif
    <a href="/users" class="btn btn-success me-4">Back</a>
</div>

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif

<div class="my-5 w-25">
    <div class="mb3">
        <label for="username" class="form-label">Username</label>
        <input type="text" name="username" id="" class="form-input" readonly value="{{ $user->username }}">
    </div>
    <div class="mb3">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" name="phone" id="" class="form-input" readonly value="{{ $user->phone }}">
    </div>
    <div class="mb3">
        <label for="adress" class="form-label">Adress</label>
        <textarea name="" id="" cols="30" rows="10" class="form-control" style="resize: none;" > {{ $user->adress }} </textarea>
    </div>
    <div class="mb3">
        <label for="status" class="form-label">Status</label>
        <input type="text" name="status" id="" class="form-input" readonly value="{{ $user->status }}">
    </div>
</div>

<div class="mt-5">
<x-rent-log-table :rentlogs='$rentlogs' />
</div>
@endsection