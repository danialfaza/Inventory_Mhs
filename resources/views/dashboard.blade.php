@extends('layouts.adminmain')

@section('content')
<script type="text/javascript">
  document.title="Dashboard";
  document.getElementById('dashboard').classList.add('active');
</script>
<section class="section">
  
  <div class="section-header">
    <h1>Dashboard</h1>
  </div>

  @if(auth()->user()->role == "admin")
  	<h4 style="color: #32364a;"><marquee>Selamat Datang {{auth()->user()->nama_user}}, Di Halaman Admin</marquee></h4>
  @elseif(auth()->user()->role == "staff")
  	<h4 style="color: #32364a;"><marquee>Selamat Datang {{auth()->user()->nama_user}}, Di Halaman Staff</marquee></h4>
  @endif
  <br>
  <marquee direction="up" scrollamount="50" behavior="slide"><div class="row">
    <div class="col-12 col-md-6 col-lg-4">
      <a href="{{url('user')}}" class="nounderline">
      <div class="card card-primary">
        <div class="card-header">
            <i id="micon" class="fa fa-user-secret" aria-hidden="true"></i>
          <div class="ml-auto">
            <h4>Total Admin</h4>
            <h3 align="center">{{ $userAdmin }}</h3>
          </div>
        </div>
      </div>
      </a>
    </div>
    <div class="col-12 col-md-6 col-lg-4">
      <a href="{{url('user')}}" class="nounderline">
      <div class="card card-warning">
        <div class="card-header">
            <i id="micon" class="fa fa-users" aria-hidden="true"></i>
          <div class="ml-auto">
            <h4>Total Staff</h4>
            <h3 align="center">{{ $userStaff }}</h3>
          </div>
        </div>
      </div>
      </a>
    </div>
    <div class="col-12 col-md-6 col-lg-4">
      <a href="{{url('fakultas')}}" class="nounderline">
      <div class="card card-info">
        <div class="card-header">
            <i id="micon" class="fa fa-university" aria-hidden="true"></i>
          <div class="ml-auto">
            <h4>Total Fakultas</h4>
            <h3 align="center">{{ $fakultas }}</h3>
          </div>
        </div>
      </div>
      </a>
    </div>
  </div></marquee>
  <marquee direction="up" scrollamount="50" behavior="slide"><div class="row">
    <div class="col-12 col-md-6 col-lg-4">
      <a href="{{url('jurusan')}}" class="nounderline">
      <div class="card card-primary">
        <div class="card-header">
            <i id="micon" class="fa fa-graduation-cap" aria-hidden="true"></i>
          <div class="ml-auto">
            <h4>Total Jurusan</h4>
            <h3 align="center">{{ $jurusan }}</h3>
          </div>
        </div>
      </div>
      </a>
    </div>
    <div class="col-12 col-md-6 col-lg-4">
      <a href="{{url('ruangan')}}" class="nounderline">
      <div class="card card-warning">
        <div class="card-header">
            <i id="micon" class="fas fa-door-open" aria-hidden="true"></i>
          <div class="ml-auto">
            <h4>Total Ruangan</h4>
            <h3 align="center">{{ $ruangan }}</h3>
          </div>
        </div>
      </div>
      </a>
    </div>
    <div class="col-12 col-md-6 col-lg-4">
      <a href="{{url('barang')}}" class="nounderline">
      <div class="card card-info">
        <div class="card-header">
            <i id="micon" class="fa fa-cubes" aria-hidden="true"></i>
          <div class="ml-auto">
            <h4>Total Barang</h4>
            <h3 align="center">{{ $barang }}</h3>
          </div>
        </div>
      </div>
      </a>
    </div>
  </div></marquee>

  <div id="clock" align="center"></div>
		
</section>
@endsection()