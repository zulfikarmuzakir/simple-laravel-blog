@extends('layouts.app')

@section('content')

@include('admin.includes.errors')

<div class="card">
	<div class="card-header">
		Category
	</div>

	<div class="card-body">
		<form action="{{ route('category.store') }}" method="POST">
			@csrf
			<div class="form-group">
				<label for="name">Name Category</label>
				<input type="text" name="name" class="form-control">
			</div>
			
			<div class="form-group">
				<div class="text-center">
					<button class="btn btn-success" type="submit">
						Create Category
					</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection