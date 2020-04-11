@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>
      Edit Data Ruangan
    </h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
          <div class="card-header">
            <a href="{{ url('ruangan') }}"> 
              <button type="button" class="btn btn-outline-info">
                <i class="fas fa-arrow-circle-left"></i> Back
              </button>
          </a>
          </div>
          <div class="card-body">
            <form action="{{url('ruangan/'.$ruangan->id.'/update')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label>Nama Jurusan</label>
                <select name="id_jurusan" class="form-control" required="">
                  @foreach($jurusan as $j)
                  <option value="{{ $j->id }}" {{ ($ruangan->id_jurusan == $j->id) ? 'selected' : ''}}>{{ $j->nama_jurusan }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>Nama Ruangan</label>
                <input type="text" name="nama_ruangan" class="form-control" value="{{ $ruangan->nama_ruangan }}">
              </div>
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