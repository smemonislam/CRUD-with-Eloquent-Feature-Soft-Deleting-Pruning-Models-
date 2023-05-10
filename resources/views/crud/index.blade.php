@extends('layouts.app')
@section('title', 'All Data')

@section('crud_content')
<div class="table-title">
    <div class="row">
        <div class="col-sm-6">
            <h2>Users <b>List</b></h2>
        </div>
        <div class="col-sm-6">
            <a href="{{ route('users.create') }}" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Add New User</span></a>
            <a href="{{ route('user-trashed') }}" class="btn btn-danger" ><i class="material-icons">&#xE15C;</i> <span>Trash</span></a>
						
        </div>
    </div>
</div>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>SL</th>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach( $users as $user )
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-flex">
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info btn-sm edit mr-2">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" >Delete</button>
            </form>
            </td>
        </tr> 
        @endforeach
        
    </tbody>
</table>
<div class="clearfix">
    {{ $users->onEachSide(5)->links() }}
</div>
@endsection
