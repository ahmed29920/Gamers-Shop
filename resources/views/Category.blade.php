@extends('layouts.homeLayout')

@section('content')
<link type="text/css" href="{{ asset('css/card.css') }}" rel="stylesheet" />
<link type="text/css" href="{{ asset('css/side.css') }}" rel="stylesheet" />
<div data-notify="container" id="alert" class="col-xs-11 col-sm-4 alert alert-info alert-with-icon" role="alert" data-notify-position="bottom-right" style="display: none; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1060; bottom: 20px; right: 20px;">
        <button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 50%; margin-top: -13px; z-index: 1062;">
            <i class="tim-icons icon-simple-remove"></i>
        </button>
        <span data-notify="icon" class="tim-icons icon-bell-55"></span> 
        <span data-notify="title"></span> 
        <span data-notify="message"><b>Gammers Shop</b> Product added To Cart Successfully <a href="{{ route('cartList') }}">View cart</a> </span>
        <a href="#" target="_blank" data-notify="url"></a>
</div>
    <section class="product_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>{{$category[0]->name}}  Products</h2>
            </div>
            <div class="row carts">
                @forelse ($products as $product)
                <div class="col-sm-6 col-lg-4">
                    <figure class="snip1423">
                        <img src="{{ asset('upload/products/' . $product->image) }}" alt="sample57" />
                            <a href="{{ route('product', $product->id) }}" style="height:90%">
                            </a>
                            <figcaption>
                                <p>{{$category[0]->name}}</p><br>
                                <h3>{{$product->title}}</h3>
                                <div class="price">
                                    @if (empty($product->discount))
                                    {{$product->price}}
                                    @else 
                                    <s>{{$product->price}}</s>   
                                    {{$product->discount }}
                                    @endif    
                                </div>
                            </figcaption>
                            <div>
                                <i class="ion-android-cart"><a data-productid="{{ $product->id }}"{{--  href="{{route('addCart',$product->id)}}" --}} class="add_cart_btn add"> </a></i>
                                
                            </div>

                        </figure>
                    </div>
                @empty
                    <div class="heading_center"style="width:100%">
                        <p class="text-center ">No Products Yet.</p>
                    </div>
                @endforelse
            </div>
        </div>
    
<aside>
  <h1 id="close"> Shopping Cart <i class="fa fa-close" style="float : right ; padding-right :5px"></i></h1>
  <nav>
      <ul>
            @forelse ($carts as $cart)
            <li>
              <img src="{{ asset('upload/products/' . $cart->product->image) }}" width="50px">
              <span style="padding-left : 10%"> {{$cart->product->title}} </span>
                <p style="padding-left : 4%">
                    @if (empty($product->discount))
                        {{$cart->amount}} x {{$cart->product->price}} EGB = 
                        <span class="productPrice"> {{$cart->amount * $cart->product->price}} EGB </span>
                        <a class="btn btn-danger" Type="submit" href="{{route('removeCart' , $cart->id)}}">REMOVE FROM CART </a>
                    @else
                        {{$cart->amount}} x {{$cart->product->discount}} EGB = 
                        <span class="productPrice"> {{$cart->amount * $cart->product->discount}} EGB </span>
                        <a class="btn btn-danger btn-sm" Type="submit" href="{{route('removeCart' , $cart->id)}}" style="float : right ; margin-right :20px"><i class="fa fa-close"></i></a>
                    @endif
                </p>
            </li>
            @empty
            @endforelse
            <li class="new">

            </li>
        </ul>
  </nav>
  
  <div class="vertical-line"></div>
  <span class="total"></span> <br>
  <a class="btn btn-info btn-sm mt-3" Type="submit" href="{{route('cartList')}}" style="width:90%">View Cart</a> <br>
  <a class="btn btn-success btn-sm mt-2 mb-4" Type="submit" href="#" style="width:90%">Checkout</a>
  
</aside>    
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script>
        $('.add').on('click', function(event) {
            event.preventDefault()

            productId = event.target.dataset['productid'];
            counter = $('.cart-counter').text();
            count = Number(counter);
            // alert(productId)
            // $('.cart-counter').text( count + 1  ); 
            $.ajax({
                method: 'GET',
                url: '/add-to-cart/' + productId,
                cache: false,
                data: {
                    product_id: productId , 
                    amount : '1'
                },
                success: function(data) {
                    $('.cart-counter').text(count + 1);
                    $('#alert').show();
                    $('#alert').delay(5000).show().fadeOut('slow');
                    $('aside').show();
                    // console.log(data);
                    $('.new').html(
                        '<span style="padding-left : 10%"> '+ data["amount"] +' </span>'
                    );

                },
            })
        });

        window.onload = function() {
            var sum = 0;
            $('.productPrice').each(function(){
               sum += parseFloat($(this).text());
            });
            if (sum) {
                $('.total').text('subtotal    :   ' + sum + '      EGB');
            }
        }

        $('#close').on('click', function(event) {
            $('aside').show().fadeOut('slow'); 
        });
    </script>
@endsection
