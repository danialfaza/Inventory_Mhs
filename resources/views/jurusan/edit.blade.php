@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>
      Edit Data Jurusan
    </h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
          <div class="card-header">
            <a href="{{ url('jurusan') }}"> 
              <button type="button" class="btn btn-outline-info">
                <i class="fas fa-arrow-circle-left"></i> Back
              </button>
          </a>
          </div>
          <div class="card-body">
            <form action="{{url('jurusan/'.$jurusan->id.'/update')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label>Nama Fakultas</label>
                <select name="id_fakultas" class="form-control" required="">
                  @foreach($fakultas as $f)
                  <option value="{{ $f->id }}" {{ ($jurusan->id_fakultas == $f->id) ? 'selected' : ''}}>{{ $f->nama_fakultas }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>Nama Jurusan</label>
                <input type="text" name="nama_jurusan" class="form-control" value="{{ $jurusan->nama_jurusan }}">
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