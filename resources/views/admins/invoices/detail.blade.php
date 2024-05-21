@extends('layouts.master')

@section('content')
<div class="container">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between ">
            <b class="m-0 font-weight-bold text-primary">Invoice Details</b>
            <span>
                <a href="{{route('invoice.index')}}" class=" btn btn-primary btn-sm">
                    <span>Back</span>
                </a>
                <a href="{{route('invoice.print', $invoice->id)}}" target="_blank" class=" btn btn-primary btn-sm">
                <i class="fa fa-print"></i>
                    <span>Print</span>
                </a>
            </span>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h1>Mini Mart</h1>
                    <h2>The Tela Cambdia</h2>
                    <p>Address : HWC2+25X, មហាវិថី សេនាប្រមុខគីមអុីលស៊ុង (២៨៩), ភ្នំពេញ</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 mb-3 ">
                    <b>Invoice No : {{$invoice->inv_no}}</b>
                    <i class="d-block">Invoice Date: {{Carbon\Carbon::parse($invoice->created_at)->format('d/m/Y')}}</i>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Quanity</th>
                            <th>Unit Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <?php $sub_total = 0; ?>
                    @foreach($invoice_details as $k => $detail)
                    <?php $sub_total += $detail->total_amount ?>
                    <tbody>
                        <tr>
                            <td>{{$k+1}}</td>
                            <td>{{$detail->product_name}}</td>
                            <td>{{$detail->quantity}}</td>
                            <td>${{number_format($detail->price, 2)}}</td>
                            <td>${{number_format($detail->total_amount, 2)}}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="4" class="text-right">
                                <strong>Sub Total</strong>
                            </td>
                            <td>${{number_format($sub_total, 2)}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection