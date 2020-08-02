@extends('layouts.default')

@section('content')
<div class="card shadow">
	<div class="card-body">
			@if(session('failed'))
			<div class="alert alert-danger">{{ session('failed') }}</div>
			@endif
		<form action="{{ route('service.update', $item->id) }}" method="post" enctype="multipart/form-data">
		@csrf
		@method('PUT')
		<div class="form-group">
			<label for="">Title</label>
			<input  type="text" 
					name="title" 
					class="form-control @error('title')is-invalid @enderror" 
					value="{{ old('title') ?? $item->title }}">
			@error('title')
			<div class="invalid-feedback">{{$message}}</div>
			@enderror
		</div>
		<div class="form-group">
			<label for="">Description</label>
			<textarea 	name="description" id="" cols="30" rows="10"
						class="form-control">{{ old('description') ?? $item->description }}</textarea>
			@error('description')
			<div class="invalid-feedback">{{$message}}</div>
			@enderror
		</div>
		<div class="form-group">
			<label for="">image</label>
			<input  type="file" 
					name="image" 
					accept="image/*" 
					class="form-control @error('image')is-invalid @enderror" 
					value="{{ old('image') ?? $item->image }}">
			<input type="hidden" name="old_img" value="{{ $item->getRawOriginal('image') }}">
			@error('image')
			<div class="invalid-feedback">{{$message}}</div>
			@enderror
		</div>
				
		<div class="text-center mt-3">
			<button type="submit" class="btn btn-primary col-12">Save</button>
		</div>
		</form>
	</div>
</div>
@endsection