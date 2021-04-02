@extends('layouts.app')

@section('content')

<div class="card">
	<div class="card-header">
		Tags
	</div>
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
						<div class="modal fade" tabindex="-1" id="myModal">
							<div class="modal-dialog">
							  <div class="modal-content">
								<div class="modal-header">
								  <h5 class="modal-title">Delete Tag</h5>
								  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								  </button>
								</div>
								<div class="modal-body">
								  <p>Are you sure you want to delete this tag permanently?</p>
								</div>
								<div class="modal-footer">
								  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
								  <a href="{{ route('tag.delete', ['id' => $tag->id ]) }}" class="btn btn-danger">Delete</a>
								</div>
							  </div>
							</div>
						</div>
						<button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#myModal">
							Delete
						  </button>
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