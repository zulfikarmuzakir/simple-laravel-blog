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
						<div class="modal fade" tabindex="-1" id="myModal">
							<div class="modal-dialog">
							  <div class="modal-content">
								<div class="modal-header">
								  <h5 class="modal-title">Delete Post</h5>
								  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								  </button>
								</div>
								<div class="modal-body">
								  <p>Are you sure you want to delete this post permanently?</p>
								</div>
								<div class="modal-footer">
								  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
								  <a href="{{ route('post.kill', ['id' => $post->id]) }}" class="btn btn-danger">Delete</a>
								</div>
							  </div>
							</div>
						</div>
						<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal">
							Delete
						  </button>
						
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