@extends('layouts.mainlayout')
@section('title', 'Book List')

@section('content')
<h1>Book List</h1>
<div class="my-5 d-flex justify-content-end">
<a href="book-add" class="btn btn-primary me-4">Add Data</a>
<a href="book-deleted" class="btn btn-success">View Deleted data!</a>
</div>
<div class="my-5">
    <div class="mt-5">
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>No. </th>
                <th>Code</th>
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->book_code }}</td>
                <td>{{ $item->title }}</td>
                <td>
                    @foreach ( $item->categories as $category)
                        {{ $category->name  }} <br />
                    @endforeach
                </td>
                <td>{{ $item->status }}</td>
                <td>
                    <a href="/book-edit/{{ $item->slug }}">Edit</a>
                    <a href="/book-delete/{{ $item->slug }}">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection