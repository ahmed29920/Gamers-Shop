@extends('layouts.homeLayout')

@section('content')
    <div class="container card ">
        <div class="row">
            <div class="col-md-6 bg-light border-right user-profile">
                <div class="left-side">
                    <h1 class="mt-2 ">{{trans('main.my_account')}}</h1>
                    <div class="mt-4 user-profile-links">
                        <div class="border-bottom border-info {{  'en/edit-account' == request()->path() ? 'active' : '' }}">  
                            <a href="{{ route('editProfile') }}" class=""><i
                                class="fa fa-user ml-5"></i>  {{trans('main.user_email')}}</a> <br>
                        </div>
                        <div class="border-bottom border-info mt-3 mb-3  {{ 'en/orders'  == request()->path() ? 'active' : '' }}">  
                            <a href="{{ route('orders') }}" class=""><i
                                    class="fa fa-list ml-5"></i>   {{trans('main.orders')}}</a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-6">
                <div class="py-5 ">
                    @yield('profile_content')
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
