@extends('layouts.app')
@section('title', 'Edit User')

@section('crud_content')
<div class="table-title">
    <div class="row">
        <div class="col-sm-6">
            <h2>Users <b>Edit</b></h2>
        </div>
        <div class="col-sm-6">
            <a href="{{ route('users.index') }}" class="btn btn-danger" ><span>Back</span></a>
            <a href="{{ route('users.create') }}" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Add New User</span></a>
						
        </div>
    </div>
</div>
<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <div class="modal-header">						
        <h4 class="modal-title">Edit User</h4>
    </div>
    <div class="modal-body">					
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>					
    </div>
    <div class="modal-footer">
        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
        <input type="submit" class="btn btn-success" value="Add">
    </div>
</form>
@endsection
