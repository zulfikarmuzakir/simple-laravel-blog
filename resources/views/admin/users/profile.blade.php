@extends('layouts.app')

@section('content')

@include('admin.includes.errors')

<div class="card">
	<div class="card-header">
		Edit user profile
	</div>

	<div class="card-body">
		<form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<label for="name">Username</label>
				<input type="text" name="name" value="{{ $user->name }}" class="form-control">
			</div>
			<div class="form-group">
				<label for="name">Email</label>
				<input type="email" name="email" value="{{ $user->email }}" class="form-control">
			</div>
			<div class="form-group">
				<label for="name">New Password</label>
				<input type="password" name="password" class="form-control">
			</div>
			<div class="form-group">
				<label for="name">Upload new Avatar</label>
				<input type="file" name="avatar" class="form-control">
			</div>
			<div class="form-group">
				<label for="name">Facebook</label>
				<input type="text" name="facebook" value="{{ $user->profile->facebook }}" class="form-control">
			</div>
			<div class="form-group">
				<label for="name">Twitter</label>
				<input type="text" name="twitter" value="{{ $user->profile->twitter }}" class="form-control">
			</div>
			<div class="form-group">
				<label for="name">Instagram</label>
				<input type="text " name="instagram" value="{{ $user->profile->instagram }}" class="form-control">
			</div>
			<div class="form-group">
				<label for="name">About</label>
				<textarea name="about" id="about" cols="70" rows="6">{{ $user->profile->about }}</textarea>
			</div>
			<div class="form-group">
				<div class="text-center">
					<button class="btn btn-success" type="submit">
						Update User
					</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection