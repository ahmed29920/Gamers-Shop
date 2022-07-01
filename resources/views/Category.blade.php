@extends('layouts.homeLayout')

@section('content')
    <section class="product_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Products
                </h2>
            </div>
            <div class="row">
                @forelse ($products as $product)
                    <div class="col-sm-6 col-lg-4">
                        <div class="box">
                            <div class="img-box">
                                <img src="{{ asset('upload/products/' . $product->image) }}" alt="">
                                <a data-productid="{{ $product->id }}" class="add_cart_btn add">
                                    <span>
                                        <!-- Add To Cart -->
                                        <i class="fa fa-cart-plus"></i>
                                    </span>
                                </a>
                            </div>
                            <div class="detail-box">
                                <span class="text-muted">{{ $category[0]->name }}</span>
                                <h3> {{ $product->title }}</h3>
                                <p class="card-title">{{ $product->description }}</p>
                                <div class="float-left">
                                    @if (empty($product->discount))
                                        <h5 class="card-title"> {{ $product->price }} EGP </h5>
                                    @else
                                        <h5 class="card-title"> <del> {{ $product->price }} EGP</del></h5>
                                        <h5 class="card-title">{{ $product->discount }}EGP</h5>
                                    @endif
                                </div>
                                <div class="product_info "><a class="btn btn-success float-right"
                                        href="{{ route('product', $product->id) }}"> Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="heading_center">
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
