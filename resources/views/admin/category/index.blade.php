@extends('layouts.app')

@section('content')

<div class="card">
	<div class="card-header">
		Category
	</div>
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
						<div class="modal fade" tabindex="-1" id="myModal">
							<div class="modal-dialog">
							  <div class="modal-content">
								<div class="modal-header">
								  <h5 class="modal-title">Delete Category</h5>
								  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								  </button>
								</div>
								<div class="modal-body">
								  <p>Are you sure you want to delete this category?</p>
								</div>
								<div class="modal-footer">
								  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
								  <a href="{{ route('category.delete', ['id' => $category->id ]) }}" class="btn btn-danger" >Delete</a>
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
					<th colspan="3" class="text-center">Category is empty</th>
				</tr>
				@endif
			</tbody>
		</table>		
	</div>
</div>

@endsection

@push('modal')
	<script>
		$('#myModal').on('shown.bs.modal', function () {
  			$('#myInput').trigger('focus')
		})
	</script>
@endpush