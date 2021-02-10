@extends('base')
@section('main')
@if( Request::get('search'))

  <div class="col-md-8">
  <h3>List of People</h3>
  <table class="table table-striped">
  <tr>
  <th>ID</th>
  <th>First Name</th>
  <th>Last Name</th>
  <th>Email</th>
  <th>City</th>
  <th>Country</th>
  </tr>
  @foreach($data as $pep)
  <tr>
  <td>{{ $pep->id }}</td>
  <td>{{ $pep->first_name }}</td>
  <td>{{ $pep->last_name }}</td>
  <td>{{ $pep->email }}</td>
  <td>{{ $pep->city }}</td>
  <td>{{ $pep->country }}</td>
  </tr>
  @endforeach
  </table>
  {{ $data->appends(request()->except('page'))->links() }}
  </div>
  @endif
</div>
</div>
<a href="{{ URL::previous() }}">Go Back</a>
