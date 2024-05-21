@extends('layouts.master')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between ">
            <b class="m-0 font-weight-bold text-primary">Products Tables</b>

            <a href="{{route('product.create')}}" class=" btn btn-primary btn-sm">
                <i class="fa fa-add"></i>
                <span>Add New Product</span>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if(session()->has('error'))
                <div class="alert alert-danger" role="alert">
                    {{session()->get('error')}}
                </div>
                @elseif(session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{session()->get('success')}}
                </div>
                @endif
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name Product</th>
                            <th>Category</th>
                            <th>Price Default</th>
                            <th>Price Sell</th>
                            <th>Photo</th>
                            <th>
                                <select class="custom-select" onchange="location = this.value;">
                                    <option selected>Status</option>
                                    <option value="{{route('product.index')}}">All</option>
                                    <option value="{{route('product.active')}}">Active</option>
                                    <option value="{{route('product.deleted')}}">Deleted</option>
                                </select>
                            </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $k => $product)
                        <tr>
                            <td>{{$k+1}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->category_name}}</td>
                            <td>{{$product->price. "$"}}</td>
                            <td>{{$product->priceSell. "$"}}</td>
                            <td><img class="object-fit-none" src="{{asset($product->photo)}}" alt="Profile" width="50px" height="50px"></td>
                            <td>
                                @if($product->status)
                                <span class="badge badge-success">Active</span>
                                @else
                                <span class="badge badge-danger">Deleted</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('product.edit', $product->id)}}" class="btn btn-success btn-sm" >
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{route('product.delete', $product->id)}}" class=" btn btn-danger btn-sm" data-value="{{ $product->id }}" data-toggle="modal" data-target="#deleteModal{{ $product->id }}">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-sm-12">
                        {{$products->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- delete product  -->
@foreach ($products as $product)
<div class="modal fade" id="deleteModal{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="ModalLabelDelete" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure to remove ?
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" href="{{route('product.delete',  $product->id)}}">Delete</a>
            </div>
        </div>
    </div>
</div>
@endforeach


@endsection