@extends('layouts.default')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Portfolio Category</h1>
</div>
<div class="row">
	<div class="col-xl-6 col-lg-6">
		<div class="card shadow">
			<div class="card-body">
			@if(session('failed'))
			<div class="alert alert-danger">{{ session('failed') }}</div>
			@endif
			<form action="{{ $itemEdit ? route('portfolio-category.update', $itemEdit->id) : route('portfolio-category.store') }}" 
			      method="post">
				@csrf
				@if ($itemEdit) @method('PUT') @endif
				<div class="form-group">
					<label for="">Category Name</label>
					<input type="text" 
						   name="name" 
						   class="form-control @error('name')is-invalid @enderror" value="{{ $itemEdit ? $itemEdit->name : old('name')}}">
					@error('name')
		            <div class="invalid-feedback">{{$message}}</div>
		            @enderror
				</div>
				
				<div class="text-center mt-3">
					<button type="submit" class="btn btn-primary">{{ $itemEdit ? 'Save Change' : 'Add Category' }}</button>
				</div>
			</form>
			</div>
		</div>
	</div>
	<div class="col-xl-6 col-lg-6">
		<div class="card shadow mb-4">
		@if ($itemEdit)
		<div class="card-header py-3">
			<a href="{{ route('portfolio-category.create') }}" class="btn btn-success">+ add new</a>
		</div>
		@endif
	    <div class="card-body">
	        <div class="table-responsive">
	                @if(session('success'))
	                <div class="alert alert-success">{{session('success')}}</div>
	                @endif
	                @if(session('failed'))
	                <div class="alert alert-danger">{{session('failed')}}</div>
	                @endif
	                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	                  <thead>
	                    <tr>
	                      <th>Name</th>
	                      <th align="right">Action</th>
	                    </tr>
	                  </thead>
	                  <tfoot>
	                    <tr>
	                      <th>Name</th>
	                      <th>Action</th>
	                    </tr>
	                  </tfoot>
	                  <tbody>
	                  	@forelse ($items as $item)
	                    <tr>
	                      <td>{{ $item->name }}</td>
	                      <td align="right">
	                        <a href="{{ route('portfolio-category.edit',$item->id) }}" class="btn btn-warning btn-sm">Edit</a>
	                        <form action="{{ route('portfolio-category.destroy', $item->id) }}" method="post" class="d-inline">
	                          @csrf
	                          @method('DELETE')
	                          <input type="submit" class="btn btn-danger btn-sm delete" value="Delete"></input>
	                        </form>
	                      </td>
	                    </tr>
	                    @empty
	                    <tr>
	                    	<td colspan="2" align="center">Data empty</td>
	                    </tr>
	                    @endforelse
	                  </tbody>
	                </table>
	        </div>
	    </div>
	</div>
</div>

</div>

@endsection