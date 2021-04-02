@extends('layouts.app')

@section('content')

<div class="row mt-5">
    <div class="col-lg-3 mt-5">
        <div class="card">
            <div class="card-header text-center bg-primary" style="color: white;">
                POSTS
            </div>
            <div class="card-body text-center">
                <h1>{{ $posts_count }}</h1>
            </div>
        </div>
    </div>

    <div class="col-lg-3 mt-5">
        <div class="card">
            <div class="card-header text-center bg-danger" style="color: white;">
                TRASHED POSTS
            </div>
            <div class="card-body text-center">
                <h1>{{ $trashed_count }}</h1>
            </div>
        </div>
    </div>

    <div class="col-lg-3 mt-5">
        <div class="card">
            <div class="card-header text-center bg-success" style="color: white;">
                USERS
            </div>
            <div class="card-body text-center">
                <h1>{{ $users_count }}</h1>
            </div>
        </div>
    </div>


    <div class="col-lg-3 mt-5">
        <div class="card">
            <div class="card-header text-center bg-info" style="color: white;">
                CATEGORIES
            </div>
            <div class="card-body text-center">
                <h1>{{ $categories_count }}</h1>
            </div>
        </div>
    </div>

    <div class="col-lg-3 mt-5">
        <div class="card">
            <div class="card-header text-center bg-warning" style="color: white;">
                TAGS
            </div>
            <div class="card-body text-center">
                <h1>{{ $tags_count }}</h1>
            </div>
        </div>
    </div>

    <div class="col-lg-3 mt-5">
        <div class="card">
            <div class="card-header text-center bg-dark" style="color: white;">
                VISITORS
            </div>
            <div class="card-body text-center">
                <h1>{{ $visitors_count }}</h1>
            </div>
        </div>
    </div>
</div>

@endsection
