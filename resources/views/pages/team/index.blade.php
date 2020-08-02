@extends('layouts.default')

@section('content')
<div class="card shadow mb-4">
		<div class="card-header py-3">
			<a href="{{ route('team.create') }}" class="btn btn-success">+ add new</a>
		</div>
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
	                      <th width="10%">Photo</th>
	                      <th width="30%">Name</th>
	                      <th width="40%">Role</th>
	                      <th align="right">Action</th>
	                    </tr>
	                  </thead>
	                  <tfoot>
	                    <tr>
	                      <th>Photo</th>
	                      <th>Name</th>
	                      <th>Role</th>
	                      <th>Action</th>
	                    </tr>
	                  </tfoot>
	                  <tbody>
	                  	@forelse ($items as $item)
	                    <tr>
	                      <td>
							<img src="{{ $item->photo }}" alt="Photo" width="100px">
	                      </td>
	                      <td>{{ $item->name }}</td>
	                      <td>{{ $item->role }}</td>
	                      <td align="right">
	                        <a href="{{ route('team.edit',$item->id) }}" class="btn btn-warning btn-sm">Edit</a>
	                        <form action="{{ route('team.destroy', $item->id) }}" method="post" class="d-inline">
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
@endsection