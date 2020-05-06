@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>Fakultas</h1>
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
            <a href="fakultas" class="pull-right">
              <button type="button" class="btn btn-info">Semua Data</button>
            </a>
          </div>
         
          <div class="card-header">
               <a href="{{url('fakultas/tambahFakultas')}}"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Fakultas</button> </a>
               <a class="btn btn-success" data-toggle="modal" data-target="#exampleModal" style="color: #fff"><i class="fas fa-file-excel"></i>&nbsp; IMPORT</a>       
          </div>
        

          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama Fakultas</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
               @forelse($fakultas as $key => $f)
                <tr>
                  <td>{{ $fakultas->firstItem()+$key }}</td>
                  <td>{{ $f->nama_fakultas}}</td>
                  <td>
                    <a href="{{url('fakultas/'.$f->id.'/edit')}}" class="btn btn-warning btn-sm">EDIT</a>
                    <a href="{{url('fakultas/'.$f->id.'/delete')}}" class="btn btn-danger btn-sm">HAPUS</a> 
                  </td>
                </tr>
               @empty
                <tr>
                  <td colspan="3"><center>Data kosong</center></td>
                </tr>
                @endforelse
              </tbody>
            </table>
            <div class="pull-right">{{$fakultas->links()}}</div>
          </div>
          <div class="card-footer text-right">
            <nav class="d-inline-block">
              
            </nav>
          </div>
        </div>
      </div>  
  </div>

</section>



    <!-- IMPORT Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form method="post" action="{{ url('/fakultas_import') }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Import Data Fakultas</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>File Excel</label><br>
                                        <input type="file" name="excel" id="excel" accept=".xlsx" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <!-- End IMPORT Modal -->
@endsection()