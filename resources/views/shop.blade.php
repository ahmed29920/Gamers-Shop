@extends('layouts.homeLayout')

@section('content')
  <!-- product section -->

  <section class="product_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          {{trans('main.shop_categories')}}
          
        </h2>
      </div>
      <div class="row">
      @foreach($categories as $category)
        <div class="col-sm-6 col-lg-4">
          <div class="box">
            <div class="img-box">
              <img src="{{ asset('upload/categories/' . $category->image) }}" alt="">
              <a href="{{ route('category' , $category->id) }}" class="add_cart_btn">
                <span>
                  {{trans('main.view_this')}} 
                </span>
              </a>
            </div>
            <div class="detail-box">
              <h5 class="text-center">
              {{$category->name}}
              </h5>
              <div class="product_info">

              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>

    </div>
  </section>

  <!-- end product section -->


@endsection
