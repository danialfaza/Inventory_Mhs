<div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Bernd</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">Be</a>
          </div>
          <ul class="sidebar-menu">
            @if(auth()->user()->role == "admin")
              <li class="">
                <a class="nav-link" href="{{url('dashboard')}}"><i class="far fa-square"></i> <span>Dashboard</span></a>
              </li>
              <li class="">
                <a class="nav-link" href="{{url('fakultas')}}"><i class="far fa-square"></i> <span>Fakultas</span></a>
              </li>
              <li class="">
                <a class="nav-link" href="{{url('jurusan')}}"><i class="far fa-square"></i> <span>Jurusan</span></a>
              </li>
              <li class="">
                <a class="nav-link" href="{{url('ruangan')}}"><i class="far fa-square"></i> <span>Ruangan</span></a>
              </li>
              <li class="">
                <a class="nav-link" href="{{url('barang')}}"><i class="far fa-square"></i> <span>Barang</span></a>
              </li>
            @elseif(auth()->user()->role == "staff")
              <li id="dashboard" class="">
                <a class="nav-link" href="{{url('/dashboard')}}"><i class="far fa-circle"></i> <span>Dashboard</span></a>
              </li>
              <li id="barang" class="">
                  <a class="nav-link" href="{{url('/barang')}}"><i class="far fa-circle"></i> <span>Barang</span></a>
                </li>
            @endif
          </ul>
        </aside>
      </div>