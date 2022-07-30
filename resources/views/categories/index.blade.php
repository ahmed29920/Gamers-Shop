@extends('layouts.app')

@section('content')
@if(Session('success'))
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
@if(Session('error'))
    <div data-notify="container" id="alert" class="col-xs-11 col-sm-4 alert alert-danger alert-with-icon" role="alert" data-notify-position="bottom-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1060; bottom: 20px; right: 20px;">
        <button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 50%; margin-top: -13px; z-index: 1062;">
            <i class="tim-icons icon-simple-remove"></i>
        </button>
        <span data-notify="icon" class="tim-icons icon-bell-55"></span> 
        <span data-notify="title"></span> 
        <span data-notify="message"><b>Gammers Shop</b> {{ Session::get('error') }}</span>
        <a href="#" target="_blank" data-notify="url"></a>
    </div>
@endif
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header mb-5">
          <h3 class="card-title">عرض الاصناف  </h3>
        </div>
        <div class="clearfix">
            <a href="{{ route('categories.create') }}" class="btn btn-success mb-2 float-end">Create New Category</a>
        </div>
        <div class="card-body">
        @if ($categories->count() > 0)
            <table class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">Name</th>
                            <th class="text-center">Image</th>
                            <th class="">Oprerations</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $categorie)
                            <tr>
                                <td class="text-center">
                                    {{ $categorie->name }}
                                </td>
                                <td class="text-center">
                                    <img class="img-fluid" src="{{ asset('upload/categories/' . $categorie->image) }}"
                                        width="70px" height="50px">
                                </td>
                                
                                <td class="ms-5 d-flex text-center">
                                    <form class=" ml-2" action="{{ route('categories.destroy', $categorie->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm ">
                                            Delete
                                        </button>
                                    </form>
                                    <a href="{{ route('categories.edit', $categorie->id) }}"
                                        class="btn btn-primary float-right btn-sm ms-3">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </table>
        @else
            <div class="card-body text-center">
                <h4>No Categories Yet.</h4>
            </div>
        @endif
        
        </div>
      </div>
    </div>
  </div>
@endsection
