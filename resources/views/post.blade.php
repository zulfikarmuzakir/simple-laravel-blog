@extends('layouts.front')

@section('content')
<div class="container mt-4">
    <div class="text-center">
        <div class="header">
            <h2>{{ $post->title }}</h2>
        </div>
        <div class="thumbnail mt-4">
            <img src="{{ $post->featured }}" class="custom-img rounded" alt="{{ $post->title }}">
            <div class="mt-4">
                <small class="text-muted">
                    <i class="fas fa-clock pr-1"></i><span
                        class="pr-2">{{ $post->created_at->toFormattedDateString() }}</span>
                    <i class="fas fa-tags pr-1"></i><span class="pr-2">{{ $post->category->name }}</span>
                    <i class="fas fa-user pr-1"></i><span class="pr-2">{{ $post->user->name }}</span>
                    <i class="fas fa-eye pr-1"></i><span class="pr-2">{{ $post->views }}</span>
                </small>
            </div>
        </div>
    </div>

    <div class="content mt-5 content-custom">
        <span class="custom-text">{!! $post->content !!}</span>
    </div>

    <div class="widget mt-5">
        <div class="tags">
            @foreach ($post->tags as $tag)
            <a href="{{ route('tag.single', ['id' => $tag->id]) }}" class="btn btn-outline-primary btn-sm" style="border: 1px solid rgba(58, 133, 191, 0.75);
			border-radius: 40px;">{{ $tag->tag }}</a>
            @endforeach
        </div>
    </div>

    <div  class="text-center">
        <a href="{{ route('downloadpdf', ['slug' => $post->slug]) }}">Download PDF</a>
    </div>

    <div class="next-prev text-center mt-4">
        @if ($next)
        <a href="{{ route('post.single', ['slug' => $next->slug]) }}" class="btn btn-warning btn-lg"><i
                class="fas fa-arrow-left mr-2 mb-2"></i>Next Post</a>
        @endif

        @if($prev)
        <a href="{{ route('post.single', ['slug' => $prev->slug]) }}" class="btn btn-warning btn-lg">Previous Post<i
                class="fas fa-arrow-right ml-2 mt-2"></i></a>
        @endif

    </div>

    <div class="profile mt-5 pt-5">
        <div class="card mx-auto" style="width: 200px;">
			<img src="{{ asset($post->user->profile->avatar) }}" class="card-img-top img-profile" alt="...">
			<div class="card-body text-center">
				<a href="{{ route('post.by', ['id' => $post->user->id]) }}" class="card-text"><h5>{{ $post->user->name }}</h5></a>
                <p><small>{{ $post->user->email }}</small></p>
				<div class="row">
					<div class="col">
						<a href="{{ $post->user->profile->facebook }}" style="text-decoration: none; color:black; font-size: 30px"><i class="fab fa-facebook-square icon-profile"></i></a>
					</div>
					<div class="col">
						<a href="{{ $post->user->profile->instagram }}" style="text-decoration: none; color:black; font-size: 30px"><i class="fab fa-instagram icon-profile"></i></a>
					</div>
					<div class="col">
						<a href="{{ $post->user->profile->twitter }}" style="text-decoration: none; color:black; font-size: 30px"><i class="fab fa-twitter icon-profile"></i></a>
					</div>
				</div>
			</div>
		  </div>
    </div>

    <div class="mt-5 comment-custom">
        @include('layouts.disqus')
    </div>

    <div class="tag-list mt-5 text-center">
        <h5>All Tags</h5>
        @foreach ($tags as $tag)
        <a href="{{ route('tag.single', ['id' => $tag->id]) }}" class="btn btn-outline-primary btn-sm" style="border: 1px solid rgba(58, 133, 191, 0.75);
		border-radius: 40px;">{{ $tag->tag }}</a>
        @endforeach

    </div>
</div>
@endsection
