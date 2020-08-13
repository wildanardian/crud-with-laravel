@extends('master')

@section('content')
<div class="card card-primary ml-3 mt-3 mr-3">
    <div class="card-header">
      <h3 class="card-title">Edit Employe {{$employe->id}}</h3>
    </div>
    <form role="form" action="/employe/{{$employe->id}}" method="POST">
    @csrf
    @method('PUT')
      <div class="card-body">
        <div class="form-group">
          <label for="inputCode">Name</label>
          <input type="text" class="form-control" id="name" name="name" values="{{ old('name','$employe->name') }}" placeholder="Name">
          @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="inputBody">Location Code</label>
          <select name="code" id="code">
              @foreach($locationCode as $key)
                <option value="{{$employe->code}}">{{$key}}</option>
              @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="inputBody">Birth Date</label>
          <input type="date" class="form-control" id="birth" name="birth" values="{{ old('birth', '$employe->birth') }}">
        </div>
        @error('name')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="card-footer">
        <a href="/employe" class="btn btn-primary">Home</a>
        <button type="submit" class="btn btn-default">Edit</button>
      </div>
    </form>
</div>
@endsection