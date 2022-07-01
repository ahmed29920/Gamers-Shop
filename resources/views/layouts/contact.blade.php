    <!-- start Contact Us-->
    <link href="{{ asset('black') }}/css/theme.css" rel="stylesheet" />
    
    <div id="plant" class="contact_us layout_padding pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="titlepage">
                        <h2><strong class="black"> Contact</strong> Us</h2>
                        <span style="text-align: center;">available, but the majority have suffered alteration in some
                            form, by injected randomised words which don't look even slightly believable</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    
    <div class="contact_us_2 layout_padding paddind_bottom_0">
        <div class="container pb-5">
            @if (Session::has('success'))
            <div data-notify="container" id="alert" class="col-xs-11 col-sm-4 alert alert-info alert-with-icon" role="alert" data-notify-position="bottom-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1060; bottom: 20px; right: 20px;">
            <button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 50%; margin-top: -13px; z-index: 1062;">
                <i class="tim-icons icon-simple-remove"></i>
            </button>
            <span data-notify="icon" class="tim-icons icon-bell-55"></span> 
            <span data-notify="title"></span> 
            <span data-notify="message"><b>Gammers Shop</b> {{ Session::get('success') }}</span>
            <a href="#" target="_blank" data-notify="url"></a>
        </div>
            @endif
            <div class="row">
                <div class="col-md-6">
                    <div class="">
                        <img class="img w-100" src="{{asset('images/contact.png')}}" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="email_btn mt-5">
                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm" placeholder="Name"
                                    name="name">
                            </div>
                            @error('name')
                                <div class="alert">
                                    <div class="alert-danger">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                            <div class="form-group">
                                <input type="email" class="form-control form-control-sm" placeholder="Email"
                                    name="email">
                            </div>
                            @error('email')
                                <div class="alert">
                                    <div class="alert-danger">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                            <div class="form-group">
                                <input type="number" class="form-control form-control-sm" placeholder="Phone"
                                    name="phone">
                            </div>
                            @error('phone')
                                <div class="alert">
                                    <div class="alert-danger">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                            <div class="form-group">
                                {{-- <input type="text" class="form-control form-control-sm " placeholder="Massage"
                                    name="message" style="width:100%"> --}}
                                    <textarea style="resize: none; width:100%" name="message" id="message" placeholder="Massage" rows="5"></textarea>
                            </div>
                            @error('message')
                                <div class="alert">
                                    <div class="alert-danger">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                            <div class="submit_btn text-center">
                                <button type="submit" class="btn btn-primary"
                                    style="background: #081b30; color: #fff; padding: 11px;">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('black') }}/js/core/jquery.min.js"></script>    

    <script>
            // $("#alert").delay(1000).hide();
            
            $().ready(function(){
                
                    $('div.alert').delay(3000);
                    $('div.alert').hide(1500);
            });
        </script>
