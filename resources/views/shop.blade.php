@extends('layouts.homeLayout')

@section('content')
  <!-- product section -->
@if(Session('error'))
    <div data-notify="container" id="alert" class="col-xs-11 col-sm-4 alert alert-danger alert-with-icon" role="alert" data-notify-position="bottom-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1060; bottom: 20px; right: 20px;">
        <span data-notify="icon" class="tim-icons icon-bell-55"></span> 
        <span data-notify="title"></span> 
        <span data-notify="message"><b>Gammers Shop</b> {{ Session::get('error') }}</span>
        <a href="#" target="_blank" data-notify="url"></a>
    </div>
@endif
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
