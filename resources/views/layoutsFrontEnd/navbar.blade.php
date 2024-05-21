<?php
$categories = DB::table('categories')->where('active', 1)->get();
?>
<div class="container">
    <nav class="navbar sticky-top navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand text-uppercase " href="#">Mart Mini</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-uppercase  {{!request()->id ? 'active' : ''}}" aria-current="page" href="{{route('home')}}">Home</a>
                    </li>
                    @foreach($categories as $menu)
                    <li class="nav-item">
                        <a class="nav-link text-uppercase  {{request()->id == $menu->id ? 'active' : ''}}" href="{{route('webpage.product_by_category', [$menu->name, $menu->id])}}">{{$menu->name}}</a>
                    </li>
                    @endforeach
                </ul>

                <div class="d-flex">
                    @if (Route::has('login'))
                    <a class="me-4 mb-2 cart" data-bs-toggle="modal" data-bs-target="#ModalViewCart">
                        <span class="text-white mb-3"><i class="fa-solid fa-cart-shopping"></i></span>
                        Cart
                    </a>
                    <div class="d-flex">
                        @auth
                        <div class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="true">
                                <span class="text-white me-2 text-uppercase "> {{auth()->user()->name}} </span>
                                @if(auth()->user()->photo)
                                <img class="img-profile rounded-circle" src="{{asset(auth()->user()->photo)}}" alt="User Image">
                                @else
                                <img src="{{asset('assets/images/defaults/default-avatar-profile-icon-of-social-media-user-vector.jpg')}}" class="img-profile rounded-circle" alt="User Image">
                                @endif
                            </a>

                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#ModalChangePassword">
                                    <i class="fa-solid fa-key mr-2 text-gray-400"></i>
                                    Change Password
                                </a>
                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#ModalChangeEmail">
                                    <i class="fa-regular fa-envelope mr-2 text-gray-400"></i>
                                    Change Email
                                </a>
                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#ModalChangeProfile">
                                    <i class="fa-solid fa-circle-user mr-2 text-gray-400"></i>
                                    Upload Profile
                                </a>
                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#ModalSetting">
                                    <i class="fa-solid fa-screwdriver-wrench mr-2 text-gray-400"></i>
                                    View Account
                                </a>
                                @if(auth()->user()->type_id == 1)
                                <a class="dropdown-item" href="{{route('dashboard')}}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Dashboard
                                </a>
                                @endif
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item logout" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </div>
                        @else
                        <a href="{{ route('login') }}" class="nav-link text-white ">Login <i class="fa-solid fa-right-to-bracket"></i></a>
                        @endauth
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </nav>
</div>


@if (Route::has('login'))
@auth
<?php
$users = DB::table('users')->find(auth()->user()->id);
?>
<!-- modal for setting  -->
<div class="modal fade " id="ModalSetting" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-12 d-flex justify-content-center ">
                    <img src="{{asset($users->photo)}}" alt="Profile" class="justify-content-center rounded-circle border border-dark " height="300px" width="300px">
                </div>
                <div class="col-8 m-auto d-flex mt-2 ">
                    <div class="col-2">Name </div>
                    <b>: {{$users->name}}</b>
                </div>
                <div class="col-8 m-auto d-flex mt-2 ">
                    <div class="col-2">Email </div>
                    <b>: {{$users->email}}</b>
                </div>
                <div class="modal-footer mt-3 justify-content-center ">
                    <button type="button" class="btn btn-danger col-8 " data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end modal  -->

<!-- modal for Change Profile  -->
<div class="modal fade " id="ModalChangeProfile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-12 d-flex justify-content-center ">
                    <img src="{{asset($users->photo)}}" alt="Profile" class="justify-content-center rounded-circle border border-dark " height="300px" width="300px">
                </div>
                <form class="mt-3" action="{{route('webpage.changeProfile')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$users->id}}">
                    <input type="hidden" name="name" value="{{$users->name}}">
                    <input type="hidden" name="email" value="{{$users->email}}">
                    <input type="hidden" name="type_user" value="2">
                    <input type="hidden" name="active" value="1">
                    <label for="profile" class="justify-content-center d-flex">Upload New Profile ? <span class="text-danger"> &nbsp; Click Here</span></label>
                    <input type="file" name="photo" id="profile">

                    <div class="mt-4 modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end modal  -->

<!-- modal for Change Email  -->
<div class="modal fade " id="ModalChangeEmail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-12 d-flex justify-content-center ">
                    <b>{{$users->email}}</b>
                </div>
                <form class="mt-3" action="{{route('webpage.changeProfile')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$users->id}}">
                    <input type="hidden" name="name" value="{{$users->name}}">
                    <input type="hidden" name="photo" value="{{$users->photo}}">
                    <input type="hidden" name="type_user" value="2">
                    <input type="hidden" name="active" value="1">
                    <label for="profile" class="d-flex">New Emaill:</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    <div class="mt-4 modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end modal  -->

<!-- modal for Change Profile  -->
<div class="modal fade " id="ModalChangePassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-12 d-flex justify-content-center ">
                    <b></b>
                </div>
                <form class="mt-3" action="{{route('webpage.changeProfile')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$users->id}}">
                    <input type="hidden" name="name" value="{{$users->name}}">
                    <input type="hidden" name="email" value="{{$users->email}}">
                    <input type="hidden" name="type_user" value="2">
                    <input type="hidden" name="active" value="1">
                    <label for="profile" class="d-flex">New Emaill:</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    <div class="mt-4 modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end modal  -->


<?php
$cartItems = \Cart::getContent();
?>
<!-- modal for Change Profile  -->
<div class="modal fade " id="ModalViewCart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

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
                                    <a href="{{route('webpage.remove', $cart->id)}}" class="btn btn-danger"><i class="fa fa-times"></i></a>
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
<!-- end modal  -->
@endauth
@endif