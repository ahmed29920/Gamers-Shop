@extends('layouts.homeLayout')

@section('content')
    <!-- slider section -->
    <section class="slider_section ">
        <div id="customCarousel1" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container ">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="detail-box">
                                    <h1>
                                        {{trans('main.welcome_to_gamers_shop')}}
                                    </h1>
                                    <p>
                                        There are many variations of passages of Lorem Ipsum available, but the majority
                                        have suffered alteration in some form, by injected humour </p>
                                    <a href="{{ route('about') }}">
                                        {{trans('main.read_more')}}
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="img-box">
                                    <img src="{{ asset('images/boksing-gloves.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach ($offers as $offer)
                    <div class="carousel-item">
                        <div class="container ">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="detail-box">
                                        <h1>
                                            {{ $offer->title }}
                                        </h1>
                                        <p>
                                            {{ $offer->description }}
                                        </p>
                                        <a href="{{ route('product', $offer->id) }}">
                                        {{trans('main.read_more')}}
                                            
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="img-box">
                                        <img src="{{ asset('upload/offer/' . $offer->image) }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="carousel_btn_box">
                <a class="carousel-control-prev" href="#customCarousel1" role="button" data-slide="prev">
                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#customCarousel1" role="button" data-slide="next">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section>
    <!-- end slider section -->
    </div>


    <!-- product section -->

    <section class="product_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    {{trans('main.shop_categories')}}
                </h2>
            </div>
            <div class="row">
                @forelse($categories as $category)
                    <div class="col-sm-6 col-lg-4">
                        <div class="box">
                            <div class="img-box">
                                <img src="{{ asset('upload/categories/' . $category->image) }}" alt="">
                                <a href="{{ route('category', $category->id) }}" class="add_cart_btn">
                                    <span>
                                      {{trans('main.read_more')}}
                                    </span>
                                </a>
                            </div>
                            <div class="detail-box text-center">
                                <h5>
                                    {{ $category->name }}
                                </h5>
                                <div class="product_info">
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center"> {{trans('main.no_categories_yet')}}</p>
                @endforelse

            </div>
            <div class="btn_box">
                <a href="{{ route('shop') }}" class="view_more-link">
                  {{trans('main.view_more')}}
                    
                </a>
            </div>
        </div>
    </section>

    <!-- end product section -->

    <!-- about section -->

    <section class="about_section">
        <div class="container-fluid  ">
            <div class="row">
                <div class="col-md-5 ml-auto">
                    <div class="detail-box pr-md-3">
                        <div class="heading_container">
                            <h2>
                                {{trans('main.we_brovide_best_for_you')}}
                            </h2>
                        </div>
                        <p>
                            Totam architecto rem beatae veniam, cum officiis adipisci soluta perspiciatis ipsa, expedita
                            maiores quae accusantium. Animi veniam aperiam, necessitatibus mollitia ipsum id optio ipsa odio
                            ab facilis sit labore officia!
                            Repellat expedita, deserunt eum soluta rem culpa. Aut, necessitatibus cumque. Voluptas
                            consequuntur vitae aperiam animi sint earum, ex unde cupiditate, molestias dolore quos quas
                            possimus eveniet facilis magnam? Vero, dicta.
                        </p>
                        <a href="{{route('about')}}">
                          {{trans('main.read_more')}}
                            
                        </a>
                    </div>
                </div>
                <div class="col-md-6 px-0">
                    <div class="img-box">
                        <img class="img" src="{{ asset('images/Profile.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end about section -->

    <!-- why us section -->

    <section class="why_us_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    {{trans('main.why_choose_us')}}
                </h2>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="box why-box">
                        <div class="img-box">
                            <img src="{{ asset('images/w1.png') }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                              {{trans('main.fast_delivery')}}
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box why-box">
                        <div class="img-box">
                            <img src="{{ asset('images/w2.png') }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                              {{trans('main.fast_service')}}
                            </h5>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box why-box">
                        <div class="img-box">
                            <img src="{{ asset('images/w3.png') }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                              {{trans('main.best_quality')}}
                            </h5>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end why us section -->


    {{-- <!-- client section -->

  <section class="client_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          What Says Our Customers
        </h2>
      </div>
    </div>
    <div class="client_container ">
      <div id="carouselExample2Controls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container">
              <div class="box">
                <div class="detail-box">
                  <p>
                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                  </p>
                  <p>
                    It is a long established fact that a reader will be distracted by the readable content of a page
                    when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                    distribution of letters, as opposed to using 'Content here, content here', making it lookIt is a
                    long established fact that a reader will be distracted by the readable content of a page when
                    looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                    distribution of letters, as opposed to using 'Content here, content here', making it look
                  </p>
                </div>
                <div class="client-id">
                  <div class="img-box">
                    <img src="{{asset('images/client.jpg')}}" alt="">
                  </div>
                  <div class="name">
                    <h5>
                      James Dew
                    </h5>
                    <h6>
                      Photographer
                    </h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container">
              <div class="box">
                <div class="detail-box">
                  <p>
                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                  </p>
                  <p>
                    It is a long established fact that a reader will be distracted by the readable content of a page
                    when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                    distribution of letters, as opposed to using 'Content here, content here', making it lookIt is a
                    long established fact that a reader will be distracted by the readable content of a page when
                    looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                    distribution of letters, as opposed to using 'Content here, content here', making it look
                  </p>
                </div>
                <div class="client-id">
                  <div class="img-box">
                    <img src="{{asset('images/client.jpg')}}" alt="">
                  </div>
                  <div class="name">
                    <h5>
                      James Dew
                    </h5>
                    <h6>
                      Photographer
                    </h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container">
              <div class="box">
                <div class="detail-box">
                  <p>
                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                  </p>
                  <p>
                    It is a long established fact that a reader will be distracted by the readable content of a page
                    when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                    distribution of letters, as opposed to using 'Content here, content here', making it lookIt is a
                    long established fact that a reader will be distracted by the readable content of a page when
                    looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                    distribution of letters, as opposed to using 'Content here, content here', making it look
                  </p>
                </div>
                <div class="client-id">
                  <div class="img-box">
                    <img src="{{asset('images/client.jpg')}}" alt="">
                  </div>
                  <div class="name">
                    <h5>
                      James Dew
                    </h5>
                    <h6>
                      Photographer
                    </h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel_btn-box">
          <a class="carousel-control-prev" href="#carouselExample2Controls" role="button" data-slide="prev">
            <span>
              <i class="fa fa-angle-left" aria-hidden="true"></i>
            </span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExample2Controls" role="button" data-slide="next">
            <span>
              <i class="fa fa-angle-right" aria-hidden="true"></i>
            </span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </section>
  <!-- end client section --> --}}
@endsection
