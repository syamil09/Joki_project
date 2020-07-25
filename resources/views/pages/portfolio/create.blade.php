@extends('layouts.default')

@section('content')
<div class="card shadow">
	<div class="card-body">
			@if(session('failed'))
			<div class="alert alert-danger">{{ session('failed') }}</div>
			@endif
		<form action="{{ route('portfolio.store') }}" method="post" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<label for="">Title</label>
			<input  type="text" 
					name="title" 
					class="form-control @error('title')is-invalid @enderror" value="{{old('title')}}">
			@error('title')
			<div class="invalid-feedback">{{$message}}</div>
			@enderror
		</div>
		<div class="form-group">
			<label for="">Description</label>
			<textarea 	name="description" id="" cols="30" rows="10"
						class="form-control">{{ old('description') }}</textarea>
			@error('description')
			<div class="invalid-feedback">{{$message}}</div>
			@enderror
		</div>
		<div class="form-group">
			<label for="">image</label>
			<input  type="file" 
					name="image" 
					accept="image/*" 
					class="form-control @error('image')is-invalid @enderror" value="{{old('image')}}">
			@error('image')
			<div class="invalid-feedback">{{$message}}</div>
			@enderror
		</div>
		<div class="form-group">
			<label for="">Title</label>
			<select name="category_id" class="form-control">
				<option value="">Select Category</option>
				@forelse ($categories as $category)
				<option value="{{ $category->id }}">{{ $category->name }}</option>
				@empty
				<option value="">Category empty</option>
				@endforelse
			</select>
			@error('category_id')
			<div class="invalid-feedback">{{$message}}</div>
			@enderror
		</div>
				
		<div class="text-center mt-3">
				<button type="submit" class="btn btn-primary">Add</button>
		</div>
		</form>
	</div>
</div>
@endsection