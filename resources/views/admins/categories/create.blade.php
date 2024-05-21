@extends('layouts.master')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4 container">
        <div class="card-header py-3 d-flex justify-content-between ">
            <b class="m-0 font-weight-bold text-primary text-center ">Add New Product</b>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('category.save') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" value="" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Photo<span class="text-danger"></span></label>
                    <input type="file" name="photo" class="form-control">
                </div>

                <a href="{{ route('category.index') }}"><button class="btn btn-success" type="button">Cancel</button></a>
                <button class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection