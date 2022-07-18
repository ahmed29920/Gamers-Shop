@extends('layouts.homeLayout')

@section('content')

<div data-notify="container" id="alert" class="col-xs-11 col-sm-4 alert alert-info alert-with-icon" role="alert" data-notify-position="bottom-right" style="display: none; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1060; bottom: 20px; right: 20px;">
        <button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 50%; margin-top: -13px; z-index: 1062;">
            <i class="tim-icons icon-simple-remove"></i>
        </button>
        <span data-notify="icon" class="tim-icons icon-bell-55"></span> 
        <span data-notify="title"></span> 
        <span data-notify="message"><b>Gamers Shop</b> Product added To Cart Successfully <a href="{{ route('cartList') }}">View cart</a> </span>
        <a href="#" target="_blank" data-notify="url"></a>
</div>
    <section class="" style="margin-top:10rem">
        <div class="container">
            <div class="header-body mt-5 mb-3">
                <h1 class="product-title ">Product Details</h1>
                <div class="row justify-content-between mt-5">
                        @forelse ($products as $product)
                            <div class = "card " style="width:100%">
                                        <!-- card left -->
                                        <div class = "product-imgs ">
                                            <div class = "img-display">
                                                <div class = "img-showcase">
                                                    <img src = "{{ asset('upload/products/' . $product->image) }}" alt = "shoe image">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- card right -->
                                        <div class = "product-content ">
                                            <h2 class = "product-title">{{$product->title}}</h2>
                                            <div class = "product-price">
                                            @if (empty($product->discount))
                                                <p class = "new-price">Price: <span>{{$product->price}}</span></p>
                                            @else
                                                <p class = "last-price">Old Price: <span>{{$product->price}}</span></p>
                                                <p class = "new-price">New Price: <span>{{$product->discount}}</span></p>
                                            @endif
                                            </div>

                                            <div class = "product-detail">
                                                <h2>about this product: </h2>
                                                <p>{{$product->description}}</p>
                                            </div>

                                            <div class = "purchase-info">
                                                <input class="amount" type = "number" min = "0" value = "1">
                                                <button type = "button" data-productid="{{ $product->id }}" class = "btn add">
                                                Add to Cart <i class = "fa fa-shopping-cart"></i>
                                                </button>
                                                <button type = "button" class = "btn">Buy Now</button>
                                            </div>
                                        </div>
                            </div>
                        @empty
                            <div class="heading_center" style="width:100%">
                                <h4 class="text-center ">No Products Yet.</h4>
                            </div>    
                        @endforelse
                </div>
            </div>
        </div>

    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script>
        $('.add').on('click', function(event) {
            event.preventDefault()
            var ProductAmount = Number($('.amount').val());
            productId = event.target.dataset['productid'];
            counter = $('.cart-counter').text();
            count = Number(counter);
            $.ajax({
                method: 'GET',
                url: '/add-to-cart/' + productId,
                cache: false,
                data: {
                    product_id: productId ,
                    amount : ProductAmount
                },
                success: function() {
                    $('.cart-counter').text(count + 1);
                    $('#alert').show();
                    $('#alert').delay(5000).show().fadeOut('slow');
                }
            })
        });
    </script>
@endsection
