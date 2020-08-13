@extends('master')

@section('content')
<div class="card card-primary ml-3 mt-3 mr-3">
    <div class="card-header">
      <h3 class="card-title">Add New Code</h3>
    </div>
    <form role="form" action="/location" method="POST">
    @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="inputCode">Code</label>
          <input type="text" class="form-control" id="code" name="code" values="{{ old('code',' ') }}" placeholder="Code">
          @error('code')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="inputBody">Name</label>
          <input type="text" class="form-control" id="name" name="name" values="{{ old('name', ' ') }}" placeholder="Name">
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