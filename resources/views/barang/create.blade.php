@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>
      Tambah Data Barang
    </h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
          <div class="card-header">
            <a href="{{ url('barang') }}"> 
              <button type="button" class="btn btn-outline-info">
                <i class="fas fa-arrow-circle-left"></i> Kembali
              </button>
          </a>
          </div>
          <div class="card-body">
            <form action="{{ url('barang/createBarang') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label>Nama Ruangan</label>
                <select name="id_ruangan" class="form-control">
                    @foreach($ruangan as $r)
                      <option value="{{ $r->id }}">{{ $r->nama_ruangan }}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control">
              </div>
              <div class="form-group">
                <label>Total Barang</label>
                <input type="number" min="1" name="total" class="form-control">
              </div>
              <div class="form-group">
                <label>Barang Rusak</label>
                <input type="number" min="0" name="rusak" class="form-control">
              </div>
              <input type="hidden" name="created_by" class="form-control" value="{{ auth()->user()->id }}">
              <div class="form-group">
                <button type="submit" class="btn btn-primary">SIMPAN</button>
              </div>
              </form>
          </div>
        </div>
      </div>  
  </div>

</section>
@endsection()