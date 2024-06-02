@extends('layouts.mainlayout')
@section('title', 'Book List')

@section('content')
<h1>Book List</h1>
<form action="" method="get">

    <div class="row">
        <div class="col-12 col-sm-6">
            <select name="category" id="category" class="form-control">
                <option value="">Select Category</option>
                @foreach ($categories as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-12 col-sm-6">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search" name="title" aria-label="Search" aria-describedby="basic-addon2">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </div>
    </div>
</form>
<div class="my-5">
    <style>
        .card {
            height: 100%;
        }

        .card-img-top {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }
    </style>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach ($books as $item)
        <div class="col">
            <div class="card h-100">
                <img src="{{ $item->cover == null ? asset('image/not-found.jpeg') : asset('storage/cover/'.$item->cover) }}" class="card-img-top" alt="{{ $item->title }}" draggable="false">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $item->book_code }}</h5>
                    <p class="card-text flex-grow-1">{{ $item->title }}</p>
                    <p class="card-text text-end fw-bold {{ $item->status == 'in stock' ? 'text-success' : 'text-danger' }}">{{ $item->status }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endsection