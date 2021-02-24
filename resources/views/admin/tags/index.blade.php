@extends('layouts.app')

@section('content')

<div class="card">
	<div class="card-body">
		<table class="table table-hover">
			<thead>
				<th>
					Tag Name
				</th>
				<th>
					Edit
				</th>
				<th>
					Delete
				</th>
			</thead>
			<tbody>
				@if ($tags->count() > 0)
				@foreach($tags as $tag)
				<tr>
					<td>
						{{ $tag->tag }}
					</td>
					<td>
						<a href="{{ route('tag.edit', ['id' => $tag->id ]) }}" class="btn btn-outline-primary btn-sm">Edit</a>
					</td>
					<td>
						<a href="{{ route('tag.delete', ['id' => $tag->id ]) }}" class="btn btn-outline-danger btn-sm">Delete</a>
					</td>
				</tr>
				@endforeach
				@else
				<tr>
					<th colspan="3" class="text-center">Tag is empty</th>
				</tr>
				@endif
			</tbody>
		</table>		
	</div>
</div>

@endsection