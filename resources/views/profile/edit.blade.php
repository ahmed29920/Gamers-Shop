@extends('layouts.homeLayout')

@section('content')
    <div class="container card">
        <div class="row">
            <div class="col-md-4 bg-light border-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mt-2">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{trans('main.home')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{trans('main.my_account')}}</li>
                    </ol>
                </nav>
                <div class="left-side">
                    <h1>{{trans('main.my_account')}}</h1>
                    <div class="list-group">
                        {{-- <button type="button" class="list-group-item list-group-item-action  {{ '/edit-account' == request()->path() ? 'active' : '' }}">
                            <a class="nav-link text-dark" href="{{ route('editProfile') }}">User & Email <i
                                    class="fa fa-user ml-5"></i></a>
                        </button> --}}
                        <a href="{{ route('editProfile') }}" class="list-group-item list-group-item-action {{  'en/edit-account' == request()->path() ? 'active' : '' }}">{{trans('main.user_email')}}<i
                                class="fa fa-user ml-5"></i></a>
                        <a href="{{ route('orders') }}" class="list-group-item list-group-item-action {{ 'en/orders'  == request()->path() ? 'active' : '' }}">{{trans('main.orders')}}<i
                                class="fa f ml-5"></i></a>

                    </div>

                </div>
            </div>
            <div class="col-md-8">
                <div class="py-5 ">
                    @yield('profile_content')
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
