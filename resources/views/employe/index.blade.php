@extends('master')

@section('content')

    <div class="ml-3 mt-3 mr-3">
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabel Employee</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @if(session('success'))
                  <div class="alert alert-success">
                    {{ session('success') }}
                  </div>
                @endif
                <a class="btn btn-primary mb-2" href="/employe/create">Tambah Employee Baru</a>
                <a class="btn btn-default mb-2" href="/location">Location</a>
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">No.</th>
                      <th style="width: 200px">Name</th>
                      <th style="width: 200px">Location Code</th>
                      <th style="width: 200px">Birth Date</th>
                      <th style="width: 300px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($employe as $key => $post)
                      <tr>
                        <td> {{ $key+1 }} </td>
                        <td> {{ $post->name }} </td>
                        <td> {{ $post->code }} </td>
                        <td> {{ $post->birth }} </td>
                        <td style="display: flex;"> 
                          <a href="/employe/{{$post->id}}/edit" class="btn btn-default btn-sm">Edit</a>
                          <form action="/employe/{{ $post->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="delete" class="btn btn-danger btn-sm">
                          </form>
                        </td>
                      </tr>
                    @empty
                      <tr>
                        <td colspan="5" align="center">Tidak ada employee</td>
                      </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>
    </div>

@endsection