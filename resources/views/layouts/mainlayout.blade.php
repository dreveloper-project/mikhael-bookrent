<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Buku | @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="main d-flex justify-content-between flex-column">
        <nav class="navbar navbar-dark navbar-expand-lg bg-primary">
            <div class="container-fluid">

                <a class="navbar-brand" href="#">Rental Buku</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>

        <div class="body-content h-100">
            <div class="row g-0 h-100">
                <div id="navbarTogglerDemo03" class="sidebar col-lg-2 collapse d-lg-block">
                    @if (Auth::user())
                    @if (Auth::user()->role_id == 1)
                    <a href="/dashboard" @if (request()->route()->uri == 'dashboard')
                        class='active'
                        @endif >Dashboard</a>
                    <a href="/books" @if (request()->route()->uri == 'books' || request()
                        ->route()->uri == 'book-add' || request()->route()->uri ==
                        'book-deleted' || request()->route()->uri == 'book-edit/{slug}' || request
                        ()->route()->uri == 'book-delete/{slug}') class='active'
                        @endif >Books</a>
                    <a href="/" @if (request()->route()->uri == '/')
                        class='active'
                        @endif >Book List</a>
                    <a href="/categories" @if(request()->route()->uri == 'categories' || request()
                        ->route()->uri == 'category-add' || request()->route()->uri ==
                        'category-deleted' || request()->route()->uri == 'category-edit/{slug}' || request
                        ()->route()->uri == 'category-delete/{slug}') class='active' @endif>Categories</a>
                    <a href="/users" @if (request()->route()->uri == 'users' || request()->route()->uri ==
                        'registered-users' || request()->route()->uri ==
                        'user-detail/{slug}' || request()->route()->uri ==
                        'user-ban/{slug}' || request()->route()->uri ==
                        'user-banned/{slug}' )
                        class='active'
                        @endif >Users</a>
                    <a href="/book-rent" @if (request()->route()->uri == 'book-rent')
                        class='active'
                        @endif >Book Rent</a>
                        <a href="/book-return" @if (request()->route()->uri == 'book-return')
                        class='active'
                        @endif >Book Return</a>
                    <a href="/rentlogs" @if (request()->route()->uri == 'rentlogs')
                        class='active'
                        @endif >Rent Logs</a>
                    <a href="/logout">Log Out</a>
                    @else
                    <a href="/profile" @if (request()->route()->uri == 'profile')
                        class='active'
                        @endif >Profile</a>
                    <a href="/" @if (request()->route()->uri == '/')
                        class='active'
                        @endif >Book List</a>
                    <a href="/logout">Log Out</a>
                    @endif
                    @else
                    <a href="/login">Log In</a>
                    @endif
                </div>
                <div class="content p-3 col-lg-10 ">@yield('content')</div>
            </div>
        </div>
    </div>




    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>