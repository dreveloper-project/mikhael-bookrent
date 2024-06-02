@extends('layouts.mainlayout')
@section('title', 'Registed User')

@section('content')
<h1>Approve Registed Users</h1>
<div class="mt-5 d-flex justify-content-end">
    <a href="/users" class="btn btn-success me-4">Back</a>
</div>
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
        @foreach ($registeredUsers as $item)
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
                        <a href="/user-detail/{{$item->slug}}">Details</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection