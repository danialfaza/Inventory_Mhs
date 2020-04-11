@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>Ruangan</h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="card-header">
            <form method="GET" class="form-inline">
              <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Search" value="{{ request()->get('search') }}">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Cari</button>
              </div>
            </form>
            <a href="{{url('ruangan')}}" class="pull-right">
              <button type="button" class="btn btn-info">Semua Data</button>
            </a>
          </div>
          <div class="card-header">
            <a href="{{url('ruangan/tambahRuangan')}}">
              <button type="button" class="btn btn-primary">Tambah Ruangan</button>
            </a>
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama Jurusan</th>
                  <th scope="col">Nama Ruangan</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
               @forelse($ruangan as $key => $r)
                <tr>
                  <td>{{ $ruangan->firstItem()+$key }}</td>
                  <td>@foreach($jurusan as $j)
                          @if($j->id == $r->id_jurusan)
                              {{ $j->nama_jurusan }}
                          @endif
                      @endforeach</td>
    
                  <td>{{ $r->nama_ruangan }}</td>
                  <td>
                    <a href="{{url('ruangan/'.$r->id.'/edit')}}" class="btn btn-warning btn-sm">EDIT</a>
                    <a href="{{url('ruangan/'.$r->id.'/delete')}}" class="btn btn-danger btn-sm">HAPUS  </a>
                  </td>
                </tr>
               @empty
                <tr>
                  <td colspan="3"><center>Data kosong</center></td>
                </tr>
                @endforelse
              </tbody>
            </table>
            <div class="pull-right">{{$ruangan->links()}}</div>
          </div>
          <div class="card-footer text-right">
            <nav class="d-inline-block">
              
            </nav>
          </div>
        </div>
      </div>  
  </div>

</section>
@endsection()