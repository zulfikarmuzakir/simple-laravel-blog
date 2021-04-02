@extends('layouts.app')

@section('content')

@include('admin.includes.errors')

<div class="card">
	<div class="card-header">
		Edit Blog
	</div>

	<div class="card-body">
		<form action="{{ route('settings.update') }}" method="POST">
			@csrf
			<div class="form-group">
				<label for="name">Site Name</label>
				<input type="text" name="site_name" value="{{ $settings->site_name }}" class="form-control">
			</div>
			<div class="form-group">
				<label for="name">Address</label>
				<input type="text" name="address" class="form-control" value="{{ $settings->address }}">
			</div>
			<div class="form-group">
				<label for="name">Contact Phone</label>
				<input type="text" name="contact_number" class="form-control" value="{{ $settings->contact_number }}">
			</div>
			<div class="form-group">
				<label for="name">Email</label>
				<input type="text" name="contact_email" class="form-control" value="{{ $settings->contact_email }}">
			</div>
			<div class="form-group">
				<label for="about-us">About Us</label>
				<textarea class="form-control" id="about-us" name="about_us" rows="10">{{ $settings->about_us }}</textarea>
			</div>
			<div class="form-group">
				<div class="text-center">
					<button class="btn btn-success" type="submit">
						edit Blog
					</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection