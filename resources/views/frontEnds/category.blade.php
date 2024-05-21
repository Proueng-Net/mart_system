<div class="row mt-3 mb-3 p-2 pb-4 bg-light rounded">
    <div class="col-md-12">
        <h2>Featured <b>Category</b></h2>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-xl-4 g-4">
            @foreach($categories as $category)
            <div class="col">
                <div class="card h-100">
                    <img src="{{asset($category->photo)}}" class="card-img-top" alt="" height="250px">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text"></p>
                    </div>
                    <div class="card-footer ">
                        <a class="nav-link" href="{{route('webpage.product_by_category', [$category->name, $category->id])}}"><button class="btn btn-primary col-12 text-uppercase ">{{$category->name}}</button> </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div