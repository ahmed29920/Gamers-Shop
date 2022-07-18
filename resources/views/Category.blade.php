@extends('layouts.homeLayout')

@section('content')
<link type="text/css" href="{{ asset('css/card.css') }}" rel="stylesheet" />
<div data-notify="container" id="alert" class="col-xs-11 col-sm-4 alert alert-info alert-with-icon" role="alert" data-notify-position="bottom-right" style="display: none; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1060; bottom: 20px; right: 20px;">
        <span data-notify="icon" class="tim-icons icon-bell-55"></span> 
        <span data-notify="title"></span> 
        <span data-notify="message"><b>Gammers Shop</b> Product added To Cart Successfully <a href="{{ route('cartList') }}">View cart</a> </span>
        <a href="#" target="_blank" data-notify="url"></a>
</div>
<div data-notify="container" id="DangerAlert" class="col-xs-11 col-sm-4 alert alert-danger alert-with-icon" role="alert" data-notify-position="bottom-right" style="display: none; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1060; bottom: 20px; right: 20px;">
        <span data-notify="icon" class="tim-icons icon-bell-55"></span> 
        <span data-notify="title"></span> 
        <span data-notify="message"><b>Gammers Shop</b> Product Removed From Cart Successfully <a href="{{ route('cartList') }}">View cart</a> </span>
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
                        <p class="text-center ">{{ trans('main.no_products_yet') }}.</p>
                    </div>
                @endforelse
            </div>
        </div>
<aside class="asideCart">
  <h1 id="close"> Shopping Cart <i class="fa fa-close" style="float : right ; padding-right :5px"></i></h1>
  <nav>
        <ul class="cartList">

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
            $.ajax({
                method: 'GET',
                url: '/add-to-cart/' + productId,
                cache: false,
                data: {
                    product_id: productId , 
                    amount : '1'
                },
                success: function(data) {
                    $('.cartList').children().remove();
                    $('.cart-counter').text(count + 1);
                    $('#alert').show();
                    $('#alert').delay(5000).show().fadeOut('slow');
                    $('aside').show();
                    const products = JSON.parse(data);
                    console.log(products);
                    var lis = $('.cartList li').length;
                    var len = products.length;
                    var diffrance = len - lis ;
                    for (var i = 0; i <= len; i++) {
                        var li = $("<li></li>");
                        li.append(' <img src=" {{ asset("upload/products/ ' + products[i].image + ' ") }} " width="50px" class="imamamg"  /> ');
                        li.append('<span style="padding-left : 10%"> ' + products[i].title + '</sapn>');
                        if (products[0].discount) {
                            li.append('<p style="padding-left : 4% ; border-bottom: 1px solid #eee; width:90%"> ' + products[i].amount + 'X' +  products[i].discount + ' EGB   = <span class="prodPrice"> '  +  products[i].amount *  products[i].discount  + ' EGB </span> </p>');
                        }
                        else{
                            li.append('<p style="padding-left : 4% ; border-bottom: 1px solid #eee;width:90%"> ' + products[i].amount + 'X' +  products[i].price + ' EGB   = <span class="prodPrice"> '  +  products[i].amount *  products[i].price  + ' EGB </span> </p>');
                        }
                        li.append('<a  class="btn btn-danger remove btn-sm" style="float : right ; margin-right :20px ; margin-top :-55px" data-cartproduct="' + products[i].id + ' "> <i class="fa fa-close"></i> </a>');
                        $(".cartList").append(li);
                        var sum = 0;
                        $('.prodPrice').each(function(){
                            sum += parseFloat($(this).text());
                        });
                        if (sum ) {
                            $('.total').text('subtotal    :   ' + sum  / 2+ '      EGB');
                        }
                    }
                    
                },
            })
        });
        

        $(document).on('click', '.remove', function(e) {
            e.preventDefault()
            var li = $(this).parent().remove();
            productId = e.target.dataset['cartproduct'];
            counter = $('.cart-counter').text();
            count = Number(counter);
            console.log(productId)
            $.ajax({
                method: 'GET',
                url: '/remove-cart/' + productId,
                cache: false,
                data: {
                    cart_id: productId ,
                },
                success: function(data) {
                    $('#DangerAlert').show();
                    $('#DangerAlert').delay(5000).show().fadeOut('slow');
                    $('aside').show();
                    $('.cart-counter').text(count - 1);
                    const products = JSON.parse(data);
                    console.log(products);
                    for (var i = 0; i <= products.length; i++) {
                        var li = $("<li></li>");
                        li.append('<img src="{{ asset("upload/products/ ' + products[i].image + ' ") }}" width="50px" />');
                        li.append('<span style="padding-left : 10%"> ' + products[i].title + '</sapn>');
                        if (products[0].discount) {
                            li.append('<p style="padding-left : 4% ; border-bottom: 1px solid #eee;"> ' + products[i].amount + 'X' +  products[i].discount + ' EGB   = <span class="prodPrice mb-1"> '  +  products[i].amount *  products[i].discount  + ' EGB </span> </p>');
                        }
                        else{
                            li.append('<p style="padding-left : 4% ; border-bottom: 1px solid #eee;"> ' + products[i].amount + 'X' +  products[i].price + ' EGB   = <span class="prodPrice mb-1"> '  +  products[i].amount *  products[i].price  + ' EGB </span> </p>');
                        }
                        li.append('<a class="btn btn-danger remove btn-sm" style="float : right ; margin-right :20px" data-productid="' + products[i].product_id + ' "> <i class="fa fa-close remove"></i> </a>');
                        var sum = 0;
                        $('.prodPrice').each(function(){
                            sum += parseFloat($(this).text());
                        });
                        if (sum) {
                            $('.total').text('subtotal    :   ' + sum + '      EGB');
                        }
                        $(".cartList").append(li);
                    }
                },
            })
        });

        $(document).on('click', '#close', function(e) {
            $('.asideCart').show().fadeOut('slow'); 
        });
    </script>
@endsection
