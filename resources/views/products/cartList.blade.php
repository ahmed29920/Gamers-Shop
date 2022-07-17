@extends('layouts.homeLayout')

@section('content')
<link type="text/css" href="{{ asset('css/cart.css') }}" rel="stylesheet" />

@if($carts)
@if(Session('message'))
    <div data-notify="container" id="alert" class="col-xs-11 col-sm-4 alert alert-info alert-with-icon" role="alert" data-notify-position="bottom-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1060; bottom: 20px; right: 20px;">
        <button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 50%; margin-top: -13px; z-index: 1062;">
            <i class="tim-icons icon-simple-remove"></i>
        </button>
        <span data-notify="icon" class="tim-icons icon-bell-55"></span> 
        <span data-notify="title"></span> 
        <span data-notify="message"><b>Gamers Shop</b> {{ Session::get('success') }}</span>
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
        <span data-notify="message"><b>Gamers Shop</b> {{ Session::get('error') }}</span>
        <a href="#" target="_blank" data-notify="url"></a>
    </div>
@endif
<!-- <div class=" d-flex justify-content-center">
    <a class="btn btn-success text-center " href="order-now"> BUY NOW </a>
</div> -->
<h1>Shopping Cart</h1> <br>
<div class="shopping-cart">
    <div class="column-labels">
        <label class="product-image">Image</label>
        <label class="product-details">Product</label>
        <label class="product-price">Price</label>
        <label class="product-quantity text-center">Quantity</label>
        <label class="product-removal">Remove</label>
        <label class="product-line-price">Total</label>
    </div>
        @foreach ($carts as $cart)
        <div class="product">
            <div class="product-image">
                <img src="{{ asset('upload/products/' . $cart->image) }}">
            </div>
            <div class="product-details">
                <div class="product-title"> {{$cart->title}}</div>
                <p class="product-description"> {{$cart->description}}</p>
            </div>
            @if (empty($product->discount))
            <div class="product-price">{{$cart->price}}</div>
            @else
            <div class="product-price">{{$cart->discount}}</div>
            @endif
            <div class="product-quantity text-center">
                {{$cart->amount}}
            </div>
            <div class="product-removal">
            <a class="btn btn-danger" Type="submit" href="remove-cart/{{$cart->id}}">REMOVE FROM CART </a>
            </div>
            @if (empty($product->discount))
            <div class="product-line-price price">{{ $cart->amount * $cart->price }}</div>
            @else
            <div class="product-line-price price">{{ $cart->amount * $cart->discount }}</div>
            @endif
        </div>
        @endforeach
        <div class="totals">
    <div class="totals-item">
      <label>Subtotal</label>
      <div class="totals-value total" id="cart-subtotal"></div>
    </div>
    <div class="totals-item">
      <label>Tax (5%)</label>
      <div class="totals-value" id="cart-tax">3.60</div>
    </div>
    <div class="totals-item">
      <label>Shipping</label>
      <div class="totals-value" id="cart-shipping">15.00</div>
    </div>
    <div class="totals-item totals-item-total">
      <label>Grand Total</label>
      <div class="totals-value" id="cart-total">90.57</div>
    </div>
  </div>
      
      <button class="checkout">Checkout</button>

</div>
    @else
        <h4 class="text-center mt-5"> Your Cart Is Empty </h4>  
    @endif    
    <script>

        window.onload = function() {
            var sum = 0;
            $('.price').each(function(){
               sum += parseFloat($(this).text());
            });
            if (sum) {
                $('.total').text(sum);
            }
        }
        // totalCoast();
    </script>
@endsection