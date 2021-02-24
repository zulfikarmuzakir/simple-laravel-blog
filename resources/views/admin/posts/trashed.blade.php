@extends('layouts.app')
@section('content')
<div class="card">
	<div class="card-body">
		<table class="table table-hover">
			<thead>
				<th>
					Image
				</th>
				<th>
					Title
				</th>
				<th>
					Edit
				</th>
				<th>
					Restore
				</th>
				<th>
					Delete Permanent
				</th>
			</thead>
			<tbody>
				@if ($posts->count() > 0)
				@foreach ($posts as $post)
				<tr>
					<td><img src="{{ $post->featured }}" alt="{{ $post->title }}" style="width: 90px; height: 50px"></td>
					<td>{{ $post->title }}</td>
					<td>Edit</td>
					<td>
						<a href="{{ route('post.restore', ['id' => $post->id]) }}" class="btn btn-warning btn-sm">Restore</a>
					</td>
					<td>
						<a href="{{ route('post.kill', ['id' => $post->id]) }}" class="btn btn-danger btn-sm">Delete</a>
					</td>
				</tr>
				@endforeach
				@else
					<tr>
						<th colspan="5" class="text-center">No trashed post</th>
					</tr>
				@endif


			</tbody>
		</table>		
	</div>
</div>

@endsection