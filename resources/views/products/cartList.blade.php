@extends('layouts.app')



@section('content')
@if($carts)
@if(Session('message'))
    <div data-notify="container" id="alert" class="col-xs-11 col-sm-4 alert alert-success alert-with-icon" role="alert" data-notify-position="bottom-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1060; bottom: 20px; right: 20px;">
        <button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 50%; margin-top: -13px; z-index: 1062;">
            <i class="tim-icons icon-simple-remove"></i>
        </button>
        <span data-notify="icon" class="tim-icons icon-bell-55"></span> 
        <span data-notify="title"></span> 
        <span data-notify="message"><b>Gammers Shop</b> {{ Session::get('message') }}</span>
        <a href="#" target="_blank" data-notify="url"></a>
    </div>
@endif
<div class=" d-flex justify-content-center">
    <a class="btn btn-success text-center " href="order-now"> BUY NOW </a>
</div>
        @foreach ($carts as $cart)
        <div class="row" style="margin-top:2rem; margin-left:5%; border-bottom: 1px solid #eee ; padding-bottom: 2rem">
            <div class="col-sm-6">
                <img src="{{ asset('upload/products/' . $cart->image) }}"class="detailes-img" style=" height:23rem ; width:20rem">
            </div>
            <div class="col-sm-6 mt-5">
                <h2>    {{$cart->title}} </h3>
                <h3> Price :  {{$cart->discount}}</h3>
                <a class="btn btn-danger" Type="submit" href="remove-cart/{{$cart->id}}">REMOVE FROM CART </a>
                
            </div>
        </div>
        @endforeach
    @else
        <h4 class="text-center mt-5"> Your Cart Is Empty </h4>  
    @endif    
@endsection