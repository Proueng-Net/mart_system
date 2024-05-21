@extends('layouts.master')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between ">
            <b class="m-0 font-weight-bold text-primary">Slideshow Tables</b>

            <a href="{{route('slideshow.create')}}" class=" btn btn-primary btn-sm">
                <i class="fa fa-add"></i>
                <span>Create New</span>
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
                            <th>Title</th>
                            <th>Content</th>
                            <th>Thumbnail</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($slideshows as $k => $slideshow)
                        <tr>
                            <td>{{$k+1}}</td>
                            <td>{{$slideshow->title}}</td>
                            <td>{{$slideshow->content}}</td>
                            <td><img class="object-fit-none" src="{{asset($slideshow->thumbnail)}}" alt="Profile" width="50px" height="50px"></td>
                            <td>
                                @if($slideshow->status)
                                <span class="badge badge-success">Active</span>
                                @else
                                <span class="badge badge-danger">Deleted</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('slideshow.edit', $slideshow->id)}}" class="btn btn-success btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{route('slideshow.delete', $slideshow->id)}}" class=" btn btn-danger btn-sm" data-value="{{ $slideshow->id }}" data-toggle="modal" data-target="#deleteModal{{ $slideshow->id }}">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Delete Category -->
@foreach ($slideshows as $slideshow)
<div class="modal fade" id="deleteModal{{ $slideshow->id }}" tabindex="-1" role="dialog" aria-labelledby="ModalLabelDelete" aria-hidden="true">
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
                <a class="btn btn-danger" href="{{route('slideshow.delete',  $slideshow->id)}}">Delete</a>
            </div>
        </div>
    </div>
</div>
@endforeach



@endsection