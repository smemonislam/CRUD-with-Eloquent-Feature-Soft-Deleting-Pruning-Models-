@extends('layouts.app')
@section('title', 'Trash Data')

@section('crud_content')
<div class="table-title">
    <div class="row">
        <div class="col-sm-6">
            <h2>Users <b>Trashed</b></h2>
        </div>
        <div class="col-sm-6">
            <a href="{{ route('users.index') }}" class="btn btn-success"><span>Back</span></a>
            <a href="{{ route('user-trashed') }}" class="btn btn-danger" ><i class="material-icons">&#xE15C;</i> <span>Trash</span></a>
						
        </div>
    </div>
</div>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($trashed as $trash)
            <tr>
                <td>{{ $trash->id }}</td>
                <td>{{ $trash->name }}</td>
                <td>{{ $trash->email }}</td>
                <td>
                    <form action="{{ route('user-delete', $trash->id) }}" method="POST" class="d-flex">
                    <a href="{{ route('user-restore', $trash->id) }}" class="btn btn-info edit mr-2">Restore</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                </td>
            </tr> 
        @empty
            <tr>
                <td class="text-center" colspan="3">Data not available</td>
            </tr>
        @endforelse
        
    </tbody>
</table>
<div class="clearfix">
    {{ $trashed->onEachSide(5)->links() }}
</div>
@endsection
