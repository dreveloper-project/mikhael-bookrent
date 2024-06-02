@extends('layouts.mainlayout')
@section('title', 'Welcome To Dashboard')

@section('content')
<div class="mt-5 d-flex justify-content-end">
    <a href="/registered-users" class="btn btn-success me-4">Registered User</a>
    <a href="/user-banned" class="btn btn-danger">View Banned User!</a>
</div>
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
            @foreach ($user as $item)
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
                    <a href="user-detail/{{ $item->slug }}">Details</a>  ||
                    <a href="user-ban/{{ $item->slug }}">Ban User</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection