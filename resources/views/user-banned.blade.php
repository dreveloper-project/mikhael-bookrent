@extends('layouts.mainlayout')
@section('title', 'User Banned')

@section('content')
<h1>User Banned</h1>

@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif
<div class="my-5">
    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Username</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bannedUser as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->username }}</td>
                <td>
                    @if ($item->phone)
                    {{ $item->phone }}
                    @else
                    No Phone Number
                    @endif
                </td>
                <td>
                    <a href="user-restore/{{ $item->slug }}">Restore</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection