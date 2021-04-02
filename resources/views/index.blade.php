<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/content.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/darkmode.css') }}">
</head>

<body>
    <header>
        @include('layouts.navbar')
    </header>

    <div>
        <div class="container mt-4 mb-4">
            <div id="carouselCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselCaptions" data-slide-to="1"></li>
                    <li data-target="#carouselCaptions" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <a href="{{ route('post.single', ['slug' => $first_slide->slug]) }}">
                            <img src="{{ $first_slide->featured }}" class="d-block w-100" style="height: 70vh"
                                alt="{{ $first_slide->title }}">
                            <div class="carousel-caption d-none d-md-block slide-title">
                                <h5>{{ $first_slide->title }}</h5>
                            </div>
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="{{ route('post.single', ['slug' => $second_slide->slug]) }}">
                            <img src="{{ $second_slide->featured }}" class="d-block w-100" style="height: 70vh"
                                alt="{{ $second_slide->title }}">
                            <div class="carousel-caption d-none d-md-block slide-title">
                                <h5>{{ $second_slide->title }}</h5>
                            </div>
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="{{ route('post.single', ['slug' => $third_slide->slug]) }}">
                            <img src="{{ $third_slide->featured }}" class="d-block w-100" style="height: 70vh"
                                alt="{{ $third_slide->title }}">
                            <div class="carousel-caption d-none d-md-block slide-title">
                                <h5>{{ $third_slide->title }}</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <div class="text-center">
                <div class="heading mb-3 mt-5">
                    <h3>
                        <i class="fas fa-newspaper mr-1"></i>Recent Post
                    </h3>
                </div>
                @if ($newest->count() > 0)
                <div class="row">

                    @foreach ($newest as $post)

                    <div class="col-md-4 col-sm-6 mb-3 pr-2 pl-2">
                        <a href="{{ route('post.single', ['slug' => $post->slug]) }}"
                            class="text-decoration-none a-custom">
                            <div class="card">
                                <img src="{{ $post->featured }}" alt="image">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        {{ $post->title }}
                                    </h5>
                                    <p class="card-text pb-2">
                                        <small class="text-muted">
                                            <i class="fas fa-clock pr-1"></i><span
                                                class="pr-2">{{ $post->created_at->toFormattedDateString() }}</span>
                                            <i class="fas fa-tags pr-1"></i><span
                                                class="pr-2">{{ $post->category->name }}</span>
                                            <i class="fas fa-user pr-1"></i><span
                                                class="pr-2">{{ $post->user->name }}</span>
                                            <i class="fas fa-eye pr-1"></i><span class="pr-2">{{ $post->views }}</span>
                                        </small>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>

                    @endforeach

                </div>

                <a href="{{ route('allpost') }}" class="btn btn-dark">See All Post</a>
                @else

                <div class="text-center nopost mt-5">
                    <h1>No post found</h1>
                </div>
                @endif

                <div class="heading mb-3 mt-5">
                    <h3>
                        <i class="fas fa-fire-alt mr-1"></i>Popular Post
                    </h3>
                </div>
                <div class="row">

                    @foreach ($popular as $post)

                    <div class="col-md-4 col-sm-6 mb-3 pr-2 pl-2 card-post">
                        <a href="{{ route('post.single', ['slug' => $post->slug]) }}"
                            class="text-decoration-none a-custom">
                            <div class="card card-post">
                                <img src="{{ $post->featured }}" alt="image">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        {{ $post->title }}
                                    </h5>
                                    <p class="card-text pb-2">
                                        <small class="text-muted">
                                            <i class="fas fa-clock pr-1"></i><span
                                                class="pr-2">{{ $post->created_at->toFormattedDateString() }}</span>
                                            <i class="fas fa-tags pr-1"></i><span
                                                class="pr-2">{{ $post->category->name }}</span>
                                            <i class="fas fa-user pr-1"></i><span
                                                class="pr-2">{{ $post->user->name }}</span>
                                            <i class="fas fa-eye pr-1"></i><span class="pr-2">{{ $post->views }}</span>
                                        </small>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>

                    @endforeach

                </div>

            </div>
        </div>
    </div>
    <footer>
        @include('layouts.footer')
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/navbar.js') }}"></script>
    <script src="{{ asset('js/darkmode.js') }}"></script>
    <script src="https://kit.fontawesome.com/a45d877ac0.js" crossorigin="anonymous"></script>
</body>

</html>
