@extends('base')
@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add a contact</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      

      {{-- <form action="{{ route('advance_search') }}" method="GET">
      <h3>Advanced Search</h3><br>
      <input type="text" name="name" class="form-control" placeholder="Person's name"><br>
      <input type="text" name="address" class="form-control" placeholder="Address"><br>
      <label>Range of Age</label>
      <div class="input-group">
      <input type="text" name="min_age" class="form-control" placeholder="Start Age">
      <input type="text" name="max_age" class="form-control" placeholder="End of Age">
      </div><br>
      <input type="submit" value="Search" class="btn btn-secondary">
      </form> --}}
      </div>
     
      </div>
      </div>

      <form method="post" action="{{ route('contacts.store') }}">
          @csrf
          <div class="form-group">    
              <label for="first_name">First Name:</label>
              <input type="text" class="form-control" name="first_name"/>
          </div>
          <div class="form-group">
              <label for="last_name">Last Name:</label>
              <input type="text" class="form-control" name="last_name"/>
          </div>
          <div class="form-group">
              <label for="email">Email:</label>
              <input type="text" class="form-control" name="email"/>
          </div>
          <div class="form-group">
              <label for="city">City:</label>
              <input type="text" class="form-control" name="city"/>
          </div>
          <div class="form-group">
              <label for="country">Country:</label>
              <input type="text" class="form-control" name="country"/>
          </div>
          <div class="form-group">
              <label for="job_title">Job Title:</label>
              <input type="text" class="form-control" name="job_title"/>
          </div>                         
          <button type="submit" class="btn btn-primary">Add contact</button>
          <a href= "{{URL::previous()}}" class="btn btn-primary">Go Back</a>

      </form>
  </div>
</div>
</div>

@endsection
