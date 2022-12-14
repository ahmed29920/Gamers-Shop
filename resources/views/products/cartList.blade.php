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
<div data-notify="container" id="DangerAlert" class="col-xs-11 col-sm-4 alert alert-danger alert-with-icon" role="alert" data-notify-position="bottom-right" style="display: none; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1060; bottom: 20px; right: 20px;">
        <span data-notify="icon" class="tim-icons icon-bell-55"></span> 
        <span data-notify="title"></span> 
        <span data-notify="message"><b>Gammers Shop</b> Product Removed From Cart Successfully <a href="{{ route('cartList') }}">View cart</a> </span>
        <a href="#" target="_blank" data-notify="url"></a>
</div>
<!-- <div class=" d-flex justify-content-center">
    <a class="btn btn-success text-center " href="order-now"> BUY NOW </a>
</div> --> <br>
<div class="shopping-cart mt-2">
    <div class="column-labels">
        <label class="product-image text-center">{{ trans('main.image') }}</label>
        <label class="product-details"> {{ trans('main.product') }}</label>
        <label class="product-price"> {{ trans('main.price') }}</label>
        <label class="product-quantity text-center">{{ trans('main.quantity') }}</label>
        <label class="product-removal text-center">{{ trans('main.remove') }}</label>
        <label class="product-line-price">{{ trans('main.total') }}</label>
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
                <a class="btn btn-danger removeProduct"   Type="submit"  data-productid="{{$cart->id}}" > {{ trans('main.remove_from_cart') }}</a>
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
      <label> {{ trans('main.subtotal') }}</label>
      <div class="totals-value total" id="cart-subtotal"></div>
    </div>
    <div class="totals-item">
      <label>{{ trans('main.tax') }} (5%)</label>
      <div class="totals-value" id="cart-tax">3.60</div>
    </div>
    <div class="totals-item">
      <label>{{ trans('main.shipping') }}</label>
      <div class="totals-value" id="cart-shipping">15.00</div>
    </div>
    <div class="totals-item totals-item-total">
      <label> {{ trans('main.grand_total') }}</label>
      <div class="totals-value" id="cart-total">90.57</div>
    </div>
  </div>
      <button class="checkout">{{ trans('main.checkout') }}</button>
</div>
    @else
        <h4 class="text-center mt-5">{{ trans('main.your_cart_is_empty') }}  </h4>  
    @endif   
   
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
  

<script>


$('.removeProduct').on('click', function(event) {
    counter = $('.cart-counter').text();
    count = Number(counter);
    event.preventDefault()
    productId = event.target.dataset['productid'];
    var li =  $(this);
    $.ajax({
        method: 'GET',
        url: '/remove-cart/' + productId,
        cache: false,
        data: {
            cart_id: productId ,
        },
        success: function() {
            li.parent().parent().remove();
            $('.cart-counter').text(count - 1);
            $('#DangerAlert').show();
            $('#DangerAlert').delay(5000).show().fadeOut('slow');
            var sum = 0;
            $('.price').each(function(){
               sum += parseFloat($(this).text());
            });
            if (sum) {
                $('.total').text(sum);
            }
        },
    })
});

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