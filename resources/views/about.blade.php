@extends('layouts.homeLayout')

@section('content')
      <!--about -->
      <body class="sub_page">


  <!-- about section -->

  <section class="about_section bg-white">
    <div class="container-fluid  ">
      <div class="row ">
        <div class="col-md-5 ml-auto">
          <div class="detail-box pr-md-3">
            <div class="heading_container text-dark">
              <h2>
                {{trans('main.we_brovide_best_for_you')}}

              </h2>
            </div>
            <p class="text-dark">
              Totam architecto rem beatae veniam, cum officiis adipisci soluta perspiciatis ipsa, expedita maiores quae accusantium. Animi veniam aperiam, necessitatibus mollitia ipsum id optio ipsa odio ab facilis sit labore officia!
              Repellat expedita, deserunt eum soluta rem culpa. Aut, necessitatibus cumque. Voluptas consequuntur vitae aperiam animi sint earum, ex unde cupiditate, molestias dolore quos quas possimus eveniet facilis magnam? Vero, dicta.
            </p>
          </div>
        </div>
        <div class="col-md-6 px-0">
          <div class="img-box">
            <img src="{{asset('images/boksing-gloves.png')}}" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->

  


      @endsection