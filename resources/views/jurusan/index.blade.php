@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>Jurusan</h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="card-header">
            <form method="GET" action="{{url('jurusan/search')}}" class="form-inline">
              <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Search">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Cari</button>
              </div>
            </form>
            <a href="{{url('jurusan')}}" class="pull-right">
              <button type="button" class="btn btn-info">Semua Data</button>
            </a>
          </div>
          <div class="card-header">
            <a href="{{url('jurusan/tambahJurusan')}}">
              <button type="button" class="btn btn-primary">Tambah Jurusan</button>
            </a>
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama Jurusan</th>
                  <th scope="col">Nama Fakultas</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
               @forelse($data as $key => $j)
                <tr>
                  <td>{{ $data->firstItem()+$key }}</td>
                  <td>{{ $j->nama_jurusan}}</td>
                  <td>@foreach($fakultas as $f)
                          @if($f->id == $j->id_fakultas)
                              {{ $f->nama_fakultas }}
                          @endif
                      @endforeach</td>
                  <td>
                    <a href="{{url('jurusan/'.$j->id.'/edit')}}" class="btn btn-warning btn-sm">EDIT</a>
                    <a href="{{url('jurusan/'.$j->id.'/delete')}}" class="btn btn-danger btn-sm">HAPUS  </a>
                  </td>
                </tr>
               @empty
                <tr>
                  <td colspan="3"><center>Data kosong</center></td>
                </tr>
                @endforelse
              </tbody>
            </table>
            <div class="pull-right">{{$data->links()}}</div>
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