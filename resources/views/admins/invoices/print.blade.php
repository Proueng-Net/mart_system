<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="card-body">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h1>Mini Mart</h1>
                    <h2>The Tela Cambdia</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 mb-3 mt-3  ">
                    <b class="d-block">Address : HWC2+25X, មហាវិថី សេនាប្រមុខគីមអុីលស៊ុង (២៨៩), ភ្នំពេញ</b>
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
                    @foreach($invoice_deatils as $k => $detail)
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
                            <td>$ {{number_format($sub_total, 2)}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-sm-12 text-center">
                    <p>Thank you for buying from our store.</p>
                    <b>see you later.</b>
                </div>
            </div>
</div>
    <script>
        setTimeout(() => {
            window.print();
            window.close();
        }, 300);
    </script>
</body>
</html>