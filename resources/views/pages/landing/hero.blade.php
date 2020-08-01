@extends('layouts.default')

@section('content')
<div class="card shadow">
	<div class="card-body">
			@if(session('failed'))
			<div class="alert alert-danger">{{ session('failed') }}</div>
			@endif

			@if(session('success'))
			<div class="alert alert-success">{{ session('success') }}</div>
			@endif
		<form action="{{ route('hero.update', $item->id) }}" method="post" enctype="multipart/form-data">
		@csrf
		@method('PUT')
		<div class="form-group">
			<label for="">Title</label>
			<input  type="text" 
					name="hero_title" 
					class="form-control @error('title')is-invalid @enderror" 
					value="{{ old('hero_title') ?? $item->hero_title }}">
			@error('title')
			<div class="invalid-feedback">{{$message}}</div>
			@enderror
		</div>
		<div class="form-group">
			<label for="">Description</label>
			<textarea 	name="hero_description" id="" cols="30" rows="10"
						class="form-control">{{ old('hero_description') ?? $item->hero_description }}</textarea>
			@error('description')
			<div class="invalid-feedback">{{$message}}</div>
			@enderror
		</div>
		<div class="form-group">
			<label for="">image</label>
			<input  type="file" 
					name="hero_image" 
					accept="image/*" 
					class="form-control @error('hero_image')is-invalid @enderror" 
					value="{{ old('hero_image') ?? $item->hero_image }}">
			<input type="hidden" name="old_img" value="{{ $item->hero_image }}">
			@error('image')
			<div class="invalid-feedback">{{$message}}</div>
			@enderror
		</div>
				
		<div class="text-center mt-3">
				<button type="submit" class="btn btn-primary">Save</button>
		</div>
		</form>
	</div>
</div>
@endsection