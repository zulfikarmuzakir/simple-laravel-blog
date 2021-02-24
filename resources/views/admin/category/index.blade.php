@extends('layouts.app')

@section('content')

<div class="card">
	<div class="card-body">
		<table class="table table-hover">
			<thead>
				<th>
					Category Name
				</th>
				<th>
					Edit
				</th>
				<th>
					Delete
				</th>
			</thead>
			<tbody>
				@if ($categories->count() > 0)
				@foreach($categories as $category)
				<tr>
					<td>
						{{ $category->name }}
					</td>
					<td>
						<a href="{{ route('category.edit', ['id' => $category->id ]) }}" class="btn btn-outline-primary btn-sm">Edit</a>
					</td>
					<td>
						<a href="{{ route('category.delete', ['id' => $category->id ]) }}" class="btn btn-outline-danger btn-sm">Delete</a>
					</td>
				</tr>
				@endforeach
				@else
				<tr>
					<th colspan="3" class="text-center">Category is empty</th>
				</tr>
				@endif
			</tbody>
		</table>		
	</div>
</div>

@endsection