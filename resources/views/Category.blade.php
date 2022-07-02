@extends('layouts.homeLayout')

@section('content')
<link type="text/css" href="{{ asset('css/card.css') }}" rel="stylesheet" />
    <section class="product_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>{{$category[0]->name}}  Products</h2>
            </div>

            <div class="row">
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
                    product_id: productId
                },
                success: function() {
                    $('.cart-counter').text(count + 1);
                },
            })
        });
    </script>
@endsection
