<?php
$categories = DB::table('categories')->where('active', 1)->get();
?>

@extends('layoutsfrontEnd.master')

@section('product')
<div class="row">
    <div class="col-md-12 ">
        <h2>Category <b>{{$name}}</b></h2>
        <div class="row row-xl-md-5 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1 g-3">
            @foreach($products as $product)
            <div class="col">
                <div class="card h-100">
                    <img src="{{asset($product->photo)}}" class="card-img-top" alt="" height="250px">
                    <div class="card-body">
                        <h5 class="card-title">{{$product->name}}</h5>
                        <p class="card-text"><b>{{$product->priceSell}}$</b></p>
                    </div>
                    <div class="card-footer">
                        <form method="post" class="row  g-3" action="{{route('webpage.addCart')}}">
                            @csrf
                            <input type="hidden" name="name" value="{{$product->name}}">
                            <input type="hidden" name="id" value="{{$product->id}}">

                            <div class="gap-2 col-12">
                                <label for="guantity">Quantity<span class="form-label">*</span></label>
                                <input class="form-control" min="1" value="1" type="number" name="quantity" id="quantity">
                            </div>
                            <button class="btn btn-outline-success d-grid gap-2 col-6 mx-auto">Add To Cart</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div @endsection