@extends('layouts.master')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4 container">
        <div class="card-header py-3 d-flex justify-content-between ">
            <b class="m-0 font-weight-bold text-primary text-center ">Add New Slide</b>
        </div>
        <div class="card-body">
            <form action="{{route('slideshow.update')}}" method="post"  enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$slideshow->id}}">
                <div class="form-group">
                    <label for="">Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" value="{{$slideshow->title}}" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Content <span class="text-danger">*</span></label>
                    <input type="text" name="content" value="{{$slideshow->content}}" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="active">Status <span class="text-danger"></span></label>
                    <select name="status" id="active" class="form-control">
                        <option value="1" @if($slideshow->status === 1) selected @endif>Active</option>
                        <option value="0" @if($slideshow->status === 0) selected @endif>Deleted</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Thumbnail<span class="text-danger"></span></label>
                    <input type="file" name="thumbnail" class="form-control">
                </div>
                <a href="{{route('slideshow.index')}}"><button class="btn btn-success" type="button">Cancel</button></a>
                <button class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection