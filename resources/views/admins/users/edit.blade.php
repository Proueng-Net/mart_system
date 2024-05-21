@extends('layouts.master')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4 container">
        <div class="card-header py-3 d-flex justify-content-between ">
            <b class="m-0 font-weight-bold text-primary text-center ">Edit User</b>
        </div>
        <div class="card-body">
            <form action="{{route('user.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$user->id}}">
                <div class="form-group">
                    <label for="">Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" value="{{$user->name}}" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" value="{{$user->email}}" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Password <span class="text-danger"></span></label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">User Type <span class="text-danger"></span></label>
                    <select name="type_user" id="type_user" class="form-control">
                        <option value="1" @if($user->type_id == 1) selected @endif>Admin</option>
                        <option value="2" @if($user->type_id == 2) selected @endif>VisitorPage</option>
                        <option value="3" @if($user->type_id == 3) selected @endif>Seller</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Status <span class="text-danger"></span></label>
                    <select name="active" id="active" class="form-control">
                        <option value="1" @if($user->active == 1) selected @endif>Active</option>
                        <option value="0" @if($user->active == 0) selected @endif>Deleted</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Photo <span class="text-danger"></span></label>
                    <input type="file" name="photo" class="form-control">
                    <img src="{{asset($user->photo)}}" alt="Profile" width="100px">
                </div>
                <a class="collapse-item" href="{{route('user.index')}}"><button class="btn btn-success" type="button">Cancel</button></a>
                <a href="{{route('user.index')}}"><button class="btn btn-primary">Save</button></a>
            </form>
        </div>
    </div>
</div>
@endsection