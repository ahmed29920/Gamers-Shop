@extends('layouts.app')



@section('content')
@if(Session('success'))
    <div data-notify="container" id="alert" class="col-xs-11 col-sm-4 alert alert-info alert-with-icon" role="alert" data-notify-position="bottom-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1060; bottom: 20px; right: 20px;">
        <button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 50%; margin-top: -13px; z-index: 1062;">
            <i class="tim-icons icon-simple-remove"></i>
        </button>
        <span data-notify="icon" class="tim-icons icon-bell-55"></span> 
        <span data-notify="title"></span> 
        <span data-notify="message"><b>Gammers Shop</b> {{ Session::get('success') }}</span>
        <a href="#" target="_blank" data-notify="url"></a>
    </div>
@endif
@if(Session('error'))
    <div data-notify="container" id="alert" class="col-xs-11 col-sm-4 alert alert-danger alert-with-icon" role="alert" data-notify-position="bottom-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1060; bottom: 20px; right: 20px;">
        <button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 50%; margin-top: -13px; z-index: 1062;">
            <i class="tim-icons icon-simple-remove"></i>
        </button>
        <span data-notify="icon" class="tim-icons icon-bell-55"></span> 
        <span data-notify="title"></span> 
        <span data-notify="message"><b>Gammers Shop</b> {{ Session::get('error') }}</span>
        <a href="#" target="_blank" data-notify="url"></a>
    </div>
@endif
    <div class="clearfix">
        <a href="{{ route('products.create') }}" class="btn btn-success mb-2 float-end">Create Product</a>
    </div>
    <div class="card card-default">
        <div class="card-header">All Product</div>
          @if ($products->count() > 0)
            <table class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Price after Discount</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>
                                    <img class="img-fluid" src="{{ asset('upload/products/' . $product->image) }}" alt="" width="70px" height="50px">
                                </td>
                                <td>
                                    {{ $product->title }}
                                </td>
                                <td>
                                    {{ $product->description }}
                                </td>
                                <td>
                                    {{ $product->price }} EGP
                                </td>
                                <td>
                                    {{ $product->discount}} EGB
                                </td>
                                <td class="d-flex">
                                    <form class=" ml-2" action="{{ route('products.destroy', $product->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">
                                            Delete
                                        </button>
                                    </form>
                                    <a href="{{ route('products.edit', $product->id) }}"
                                        class="btn btn-primary float-right btn-sm">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </table>
          @else
            <div class="card-body text-center">
                <h4>No Products Yet.</h4>
            </div>
          @endif
    </div>

@endsection
