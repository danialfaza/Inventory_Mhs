@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>Barang</h1>
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
            <a href="{{url('barang')}}" class="pull-right">
              <button type="button" class="btn btn-info">Semua Data</button>
            </a>
            <a href="/barang/export_excel" class="btn btn-success my-3">EXPORT EXCEL</a>
          </div>
          @if(auth()->user()->role == "admin")
          <div class="card-header">
            <a href="{{url('barang/tambahBarang')}}">
              <button type="button" class="btn btn-primary">Tambah Barang</button>
            </a>
          </div>
          @endif
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama Ruangan</th>
                  <th scope="col">Nama Barang</th>
                  <th scope="col">Total</th>
                  <th scope="col">Rusak</th>
                  <th scope="col">Dibuat</th>
                  <th scope="col">Dirubah</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
               @forelse($barang as $key => $b)
                <tr>
                  <td>{{ $barang->firstItem()+$key }}</td>
                  <td>{{ $b->ruangan->nama_ruangan }}</td>
                  <td>{{ $b->nama_barang }}</td>
                  <td>{{ $b->total }}</td>
                  <td>{{ $b->broken }}</td>
                  <td>
                      @foreach($user as $u)
                          @if($u->id == $b->created_by)
                              {{ $u->nama_user }}
                          @endif
                      @endforeach
                  </td>
                  <td>
                      @foreach($user as $u)
                          @if($u->id == $b->updated_by)
                              {{ $u->nama_user }}
                          @endif
                      @endforeach</td>
                  <td>
                    <a href="{{url('barang/'.$b->id.'/edit')}}" class="btn btn-warning btn-sm">EDIT</a>
                    @if(auth()->user()->role == "admin")
                    <a href="{{url('barang/'.$b->id.'/delete')}}" class="btn btn-danger btn-sm">HAPUS  </a>
                    @endif
                  </td>
                </tr>
               @empty
                <tr>
                  <td colspan="8"><center>Data kosong</center></td>
                </tr>
                @endforelse
              </tbody>
            </table>
            <div class="pull-right">{{$barang->links()}}</div>
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