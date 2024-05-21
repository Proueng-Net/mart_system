@extends('layouts.master')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4 container">
        <div class="card-header py-3 d-flex justify-content-between ">
            <b class="m-0 font-weight-bold text-primary text-center ">Making Order Here</b>
        </div>
        <div class="card-body">
            @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{session()->get('success')}}
            </div>
            @endif
            <form method="post" class="row  g-3" action="{{route('order.addCart')}}">
                @csrf
                <div class="col-md-4">
                    <label for="product">Category<span class="text-danger">*</span></label>
                    <select name="id" id="product" class="form-control">
                        <option value="">--- please select product ---</option>
                        @foreach($products as $product)
                        <option value="{{$product->id}}">{{$product->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="guantity">Quantity<span class="form-label">*</span></label>
                    <input class="form-control" min="1" value="1" type="number" name="quantity" id="quantity">
                </div>

                <div class="col-md-3 mt-2">
                    <label></span></label>
                    <button class="form-control btn btn-success">Add To Cart</button>
                </div>
            </form>
        </div>
    </div>
    <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between ">
            <b class="m-0 font-weight-bold text-primary text-center ">Product added in cart</b>
            <a href="{{route('order.clear')}}" ><button class="btn btn-success">Clear All Cart</button></a>
        </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form action="{{route('order.save')}}" method="post">
                        @csrf
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Quanity</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $sub_total = 0;
                                @endphp
                                @foreach($cartItems as $key => $cart)
                                @php
                                $sub_total += $cart->price * $cart->quantity;
                                @endphp
                                <input type="hidden" name="id[]" value="{{$cart->id}}">
                                <input type="hidden" name="price[]" value="{{$cart->price}}">
                                <input type="hidden" name="quantity[]" value="{{$cart->quantity}}">
                                <input type="hidden" name="total[]" value="{{$cart->price * $cart->quantity}}">
                                <tr>
                                    <td>{{$key}}</td>
                                    <td>
                                        <img src="{{asset($cart->attributes->image)}}" alt="" width="50px" height="50px">
                                    </td>
                                    <td>{{$cart->name}}</td>
                                    <td>{{$cart->quantity}}</td>
                                    <td>${{$cart->price}}</td>
                                    <td>${{$cart->price * $cart->quantity}}</td>
                                    <td>
                                        <a href="{{route('order.remove', $cart->id)}}" class="btn btn-danger"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="5" class="text-right"><strong>Sub Total:</strong></td>
                                    <td>${{number_format($sub_total, 2)}}</td>
                                    <td>
                                        <button class="btn btn-primary">Save Order</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
</div>
@endsection