@extends('layouts.app')

@section('content')

@include('admin.includes.errors')

<div class="card">
	<div class="card-header">
		Create a new post
	</div>

	<div class="card-body">
		<form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<label for="title">Title</label>
				<input type="text" name="title" class="form-control">
			</div>
			<div class="form-group">
				<label for="featured">Featured Image</label>
				<input type="file" name="featured" class="form-control">
			</div>
			<div class="form-group">
				<label for="category">Select a Category</label>
				<select name="category_id" id="category" class="form-control">
					@foreach($categories as $category)
					<option value="{{ $category->id }}">{{ $category->name }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="tags">Select tags</label>
				@foreach($tags as $tag)
				<div class="form-check">
					<label class="form-check-label" for="defaultCheck1">
						<input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id }}" id="defaultCheck1">
						{{ $tag->tag }}	
					</label>
				</div>
				@endforeach
			</div>
			<div class="form-group">
				<label for="content">Content</label>
				<textarea name="content" id="summernote" cols="5" rows="5" class="form-control"></textarea>
			</div>
			<div class="form-group">
				<div class="text-center">
					<button class="btn btn-success" type="submit">
						Post
					</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection

@push('styles')
<link href="{{ asset('summernote/summernote-bs4.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('summernote/summernote-bs4.min.js') }}"></script>
<script>
	$('#summernote').summernote({
        placeholder: 'Start writing..',
        tabsize: 2,
        height: 500
      });
</script>
@endpush