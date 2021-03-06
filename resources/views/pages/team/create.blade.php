@extends('layouts.default')

@section('content')
<div class="card shadow">
	<div class="card-body">
			@if(session('failed'))
			<div class="alert alert-danger">{{ session('failed') }}</div>
			@endif
		<form action="{{ route('team.store') }}" method="post" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<label for="">Name</label>
			<input  type="text" 
					name="name" 
					class="form-control @error('name')is-invalid @enderror" value="{{old('name')}}">
			@error('name')
			<div class="invalid-feedback">{{$message}}</div>
			@enderror
		</div>
		<div class="form-group">
			<label for="">Role</label>
			<input  type="text" 
					name="role" 
					class="form-control @error('role')is-invalid @enderror" value="{{old('role')}}">
			@error('role')
			<div class="invalid-feedback">{{$message}}</div>
			@enderror
		</div>
		<div class="form-group">
			<label for="">Photo</label>
			<input  type="file" 
					name="photo" 
					accept="image/*" 
					class="form-control @error('photo')is-invalid @enderror" value="{{old('photo')}}">
			@error('photo')
			<div class="invalid-feedback">{{$message}}</div>
			@enderror
		</div>
		<div class="form-group">
			<label for="">URL Instragram</label>
			<input  type="text" 
					name="url_instagram" 
					class="form-control @error('url_instagram')is-invalid @enderror" value="{{old('url_instagram')}}">
			@error('url_instagram')
			<div class="invalid-feedback">{{$message}}</div>
			@enderror
		</div>
		<div class="form-group">
			<label for="">URL Facebook</label>
			<input  type="text" 
					name="url_facebook" 
					class="form-control @error('url_facebook')is-invalid @enderror" value="{{old('url_facebook')}}">
			@error('url_facebook')
			<div class="invalid-feedback">{{$message}}</div>
			@enderror
		</div>
				
		<div class="text-center mt-3">
			<button type="submit" class="btn btn-primary col-12">Add</button>
		</div>
		</form>
	</div>
</div>
@endsection