@extends('layouts.front')

@section('content')
<div class="container mt-4">
	<div class="text-center">
		<div class="mb-5">
			<h4>Category : {{ $category->name }}</h4>
		</div>
		<div class="row">

			@foreach ($category->posts as $post)

			<div class="col-md-4 col-sm-6 mb-3 pr-2 pl-2">
				<a href="{{ route('post.single', ['slug' => $post->slug]) }}" class="text-decoration-none a-custom">
					<div class="card">
						<img src="{{ $post->featured }}" alt="image">
						<div class="card-body">
							<h5 class="card-title">
								{{ $post->title }}
							</h5>
							<p class="card-text pb-2">
								<small class="text-muted">
									<i class="fas fa-clock pr-1"></i><span class="pr-2">{{ $post->created_at->toFormattedDateString() }}</span>
									<i class="fas fa-tags pr-1"></i><span class="pr-2">{{ $post->category->name }}</span>
									<i class="fas fa-user pr-1"></i><span class="pr-2">{{ $post->user->name }}</span>
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
@endsection

@push('card-styles')
<link rel="stylesheet" href="{{ asset('css/content.css') }}">
@endpush