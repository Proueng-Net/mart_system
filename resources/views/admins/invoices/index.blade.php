@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-sm-12">
       
        <!-- <div class="row mb-3">
            <div class="col-sm-12">
                <a href="{{route('category.create')}}" class="btn btn-primary">Create</a>
            </div>
        </div> -->

        <div class="card">
            <div class="card-body">
                <h3>List of invoice</h3>
                @if(session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{session()->get('success')}}
                </div>
                @endif

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>No.</td>
                            <td>Invoice No.</td>
                            <td>Total Amount</td>
                            <td>Created By</td>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($invoices as $k => $invoice)
                        <tr>
                            <td> {{ $invoices->firstItem() + $k }}</td>
                            <td>{{$invoice->inv_no}}</td>
                            <td>${{number_format($invoice->total_amount, 2)}}</td>
                            <td>{{$invoice->created_by}}</td>
                            <td>
                              <a href="{{route('invoice.detail', $invoice->id)}}" class="btn btn-info"><i class="fa fa-eye"></i></a>
                              <a href="{{route('invoice.print', $invoice->id)}}" target="_blank" class="btn btn-success"><i class="fa fa-print"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-sm-12">
                        {{$invoices->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection