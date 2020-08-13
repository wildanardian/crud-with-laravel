@extends('master')

@section('content')

<div class="card card-primary ml-3 mt-3 mr-3">
    <div class="card-header">
      <h3 class="card-title">Edit Location {{ $location->id }}</h3>
    </div>
    <form role="form" action="/location/{{$location->id}}" method="POST">
        @csrf
        @method('PUT')
      <div class="card-body">
        <div class="form-group">
          <label for="inputJitle">Code</label>
          <input type="text" class="form-control" id="code" name="code" value="{{ old('code', $location->code) }}" placeholder="Code">
          @error('code')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="inputBody">Name</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $location->name) }}" placeholder="Name">
        </div>
        @error('name')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-default">Edit</button>
      </div>
    </form>
</div>

@endsection