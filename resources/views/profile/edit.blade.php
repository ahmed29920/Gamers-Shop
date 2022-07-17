@extends('layouts.homeLayout')

@section('content')
    <style>

    </style>

    <div class="container">
        <div class="profile-header">
            <div class="profile-img">
                {{-- <img src="./bg.jpg" width="200" alt="Profile Image"> --}}
                <img class="avatar" src="{{ Auth::user()->gravatar }}" alt="">
            </div>
            <div class="profile-nav-info">
                <h3 class="user-name">{{ Auth::user()->name }}</h3>
                <div class="address">
                    <p id="state" class="state">New York,</p>
                    <span id="country" class="country">USA.</span>
                </div>

            </div>
            {{-- <div class="profile-option">
        <div class="notification">
          <i class="fa fa-bell"></i>
          <span class="alert-message">3</span>
        </div>
      </div> --}}
        </div>


        <div class="row">
            <div class="col-md-4">
                <div class="main-bd">
                    <div class="left-side">
                        <div class="profile-side">
                            <ul class="navbar-nav ">
                                <li class="nav-item "><a class="nav-link " href="{{ route('profile.edit') }}">Orders</a>
                                </li>
                                <hr>
                                <li class="nav-item "><a class="nav-link " href="{{ route('editProfile') }}">User &
                                        Email</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="py-5 ">
                    {{-- orders --}}

                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                          </tr>
                          <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                          </tr>
                          <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>
                          </tr>
                        </tbody>
                      </table>
                    


                    @yield('profile_content')
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
