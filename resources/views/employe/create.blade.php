@extends('master')

@section('content')
<div class="card card-primary ml-3 mt-3 mr-3">
    <div class="card-header">
      <h3 class="card-title">Add New Employe</h3>
    </div>
    <form role="form" action="/employe" method="POST">
    @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="inputCode">Name</label>
          <input type="text" class="form-control" id="name" name="name" values="{{ old('name',' ') }}" placeholder="Name">
          @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="inputBody">Location Code</label>
          <select name="code" id="code">
              @foreach($locationCode as $key)
                <option value="{{$key}}">{{$key}}</option>
              @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="inputBody">Birth Date</label>
          <input type="date" class="form-control" id="birth" name="birth" values="{{ old('birth', ' ') }}">
        </div>
        @error('name')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Create</button>
      </div>
    </form>
</div>
@endsection