<div class="row">
    @foreach($categories as $category)
    <?php
    $products = DB::table('products')
        ->where('status', 1)
        ->where('category_id', $category->id)
        ->limit(5)
        ->get();
    ?>
    <div class="col-md-12 mb-3 pb-3  bg-light rounded ">
        <h2>Category <b>{{$category->name}}</b></h2>
        <div class="row  row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-3">
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
        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
            <a class="  btn btn-primary  {{request()->id == $category->id ? 'active' : ''}}" href="{{route('webpage.product_by_category', [$category->name, $category->id])}}">See More</a>
        </div>
    </div>
    @endforeach
</div>