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
					Name
				</th>
				<th>
					Permissions
				</th>
				<th>
					Delete
				</th>
			</thead>
			<tbody>
				@if ($users->count() > 0)
				@foreach ($users as $user)
				<tr>
					<td><img src="{{ asset($user->profile->avatar) }}" alt="" width="60px" style="border-radius: 50%"></td>
					<td>{{ $user->name }}</td>
					<td>@if ($user->admin)
						<a href="{{ route('user.not.admin', ['id' => $user->id]) }}" class="btn btn-sm btn-danger">Remove permission</a>
						@else
						<a href="{{ route('user.admin', ['id' => $user->id]) }}" class="btn btn-sm btn-success">Make admin</a>
					@endif</td>
					<td>
						@if (Auth::id() !== $user->id)
							<a href="{{ route('user.delete', ['id' => $user->id]) }}" class="btn btn-sm btn-danger">Delete</a>
						@endif
					</td>
				</tr>
				@endforeach
				@else
				<tr>
					<th colspan="4" class="text-center">No user</th>
				</tr>
				@endif

			</tbody>
		</table>		
	</div>
</div>

@endsection