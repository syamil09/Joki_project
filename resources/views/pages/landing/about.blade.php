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
		<form action="{{ route('about.update', $item->id) }}" method="post" enctype="multipart/form-data">
		@csrf
		@method('PUT')
		<div class="form-group">
			<label for="">Description</label>
			<textarea 	name="about_us" id="" cols="30" rows="10"
						class="form-control">{{ old('about_us') ?? $item->about_us }}</textarea>
			@error('about_us')
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