@extends('layoutsfrontEnd.master')

@section('slideShow')
    @include('frontEnds.slideshow')
@endsection

@section('category')
    @include('frontEnds.category')
@endsection

@section('product')
    @include('frontEnds.productbycategory')
@endsection

@section('footer')
    @include('layoutsfrontEnd.footer')
@endsection