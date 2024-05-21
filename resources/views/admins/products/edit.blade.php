@extends('layouts.master')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4 container">
        <div class="card-header py-3 d-flex justify-content-between ">
            <b class="m-0 font-weight-bold text-primary text-center ">Edit Product</b>
        </div>
        <div class="card-body">
            <form action="{{route('product.update')}}" method="post"  enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$product->id}}">
                <div class="form-group">
                    <label for="">Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" value="{{$product->name}}" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Category<span class="text-danger">*</span></label>
                    <select name="category_id" id="category" class="form-control">
                        <option value="" requried>---- select category ---</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}"  @if($product->category_id == $category->id) selected @endif>{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Price Default ($)<span class="text-danger"></span></label>
                    <input type="number" value="{{$product->price}}" name="priceDefault" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Price Sell ($)<span class="text-danger"></span></label>
                    <input type="number" value="{{$product->priceSell}}" name="priceSell" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Status <span class="text-danger"></span></label>
                    <select name="active" id="active" class="form-control">
                        <option value="1" @if($product->status === 1) selected @endif>Active</option>
                        <option value="0" @if($product->status === 0) selected @endif>Deleted</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Photo<span class="text-danger"></span></label>
                    <input type="file" name="photo" class="form-control">
                </div>
                <a class="collapse-item" href="{{route('product.index')}}"><button class="btn btn-success" type="button">Cancel</button></a>
                <button class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection