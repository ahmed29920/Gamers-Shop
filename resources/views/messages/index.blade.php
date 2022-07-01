@extends('layouts.app')



@section('content')
@if(Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
{{ Session::get('success') }}
  <button type="button" class="close mt-1" data-dismiss="alert" aria-label="Close">
      <i class="tim-icons icon-simple-remove"></i>
  </button>
</div>
@endif

    <div class="card card-default">
        <div class="card-header">All Messages</div>
          @if ($contacts->count() > 0)
            <table class="card-body">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Message</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contacts as $contact)
                            <tr>
                                <td>
                                    {{ $contact->id }}
                                </td>
                                <td>
                                    {{ $contact->name }}
                                </td>
                                <td>
                                    {{ $contact->email }}
                                </td>
                                <td>
                                    {{ $contact->phone }}
                                </td>
                                <td style="width: 30%">
                                    {{ $contact->message }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </table>
          @else
            <div class="card-body text-center">
                <h4>No Messages Yet.</h4>
            </div>
          @endif
    </div>

@endsection
