<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    @stack('styles')
    @stack('logincss')

</head>

<body>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="">
            <div class="row">
                @if(Auth::check())
                <div class="col-lg-2 custom-side bg-dark">
                    <ul class="list-group-flush">
                        <li class="list-group-item bg-dark">
                            <h5 class="text-menu">Menu</h5>
                        </li>
                        <li class="list-group-item bg-dark">
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="list-group-item bg-dark">
                            <a href="{{ route('categories') }}">Categories</a>
                        </li>
                        <li class="list-group-item bg-dark">
                            <a href="{{ route('category.create') }}">Create new category</a>
                        </li>
                        <li class="list-group-item bg-dark">
                            <a href="{{ route('tags') }}">Tags</a>
                        </li>
                        <li class="list-group-item bg-dark">
                            <a href="{{ route('tag.create') }}">Create Tag</a>
                        </li>
                        @if (Auth::user()->admin)
                        <li class="list-group-item bg-dark">
                            <a href="{{ route('users') }}">Users</a>
                        </li>
                        <li class="list-group-item bg-dark">
                            <a href="{{ route('user.create') }}">Create new user</a>
                        </li>
                        @endif
                        <li class="list-group-item bg-dark">
                            <a href="{{ route('user.profile') }}">My Profile</a>
                        </li>
                        <li class="list-group-item bg-dark">
                            <a href="{{ route('posts') }}">All Post</a>
                        </li>
                        <li class="list-group-item bg-dark">
                            <a href="{{ route('post.create') }}">Create new post</a>
                        </li>
                        <li class="list-group-item bg-dark">
                            <a href="{{ route('posts.trashed') }}">Trash</a>
                        </li>
                        @if (Auth::user()->admin)
                        <li class="list-group-item bg-dark">
                            <a href="{{ route('settings') }}">Settings</a>
                        </li>
                        @endif
                    </ul>
                </div>
                @endif
                <div class="col-lg-10">
                    <div>
                        @yield('content')
                    </div>
                </div>
            </div>


        </main>
        
        <div class="login">
            @yield('login')
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
            integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
            crossorigin="anonymous"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        @if (session('success'))
        <script>
            toastr.success("{{ session('success') }}");

        </script>
        @endif
        @if (session('info'))
        <script>
            toastr.info("{{ session('info') }}");

        </script>
        @endif

        @stack('scripts')
</body>

</html>
