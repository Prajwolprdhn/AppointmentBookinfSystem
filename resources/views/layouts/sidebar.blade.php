<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link p-4">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light pl-2" style="text-decoration: none">ABS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="justify-content: center">
        <div class="info">
          <a href="#" class="d-block" style="text-decoration: none">HELLO</a>
        </div>
      </div> --}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                {{-- <li class=" ">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-edit"></i>
                  <p>
                    Forms
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('doctors_form')}}" class="nav-link">
                      <i class="fas fa-solid fa-user-plus nav-icon"></i>
                      <p>New Doctors Form</p>
                    </a>
                  </li> --}}
                {{-- <li class="nav-item">
                    <a href="pages/forms/advanced.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Advanced Elements</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/forms/editors.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Editors</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/forms/validation.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Validation</p>
                    </a>
                  </li>
                --}}
                {{-- </ul>
            </li>  --}}
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="fa fa-th-large pr-3"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                @if (auth()->check() && auth()->user()->role == 1)
                    <li class="nav-item">
                        <a href="{{ route('doctors_table') }}" class="nav-link">
                            <i class="fa fa-user pr-3"></i>
                            <p>My Profile</p>
                        </a>
                    </li>
                @endif

                @if (auth()->check() && auth()->user()->role == 0)
                    <li class="nav-item">
                        <a href="{{ route('users_table') }}" class="nav-link">
                            <i class="fas fa-solid fa-users nav-icon pr-3"></i>
                            <p>Users</p>
                        </a>
                    </li>
                @endif
                @if (auth()->check() && auth()->user()->role == 0)
                    <li class="nav-item">
                        <a href="{{ route('doctors_table') }}" class="nav-link">
                            <i class="fa fa-user pr-3"></i>
                            <p>Doctors Management</p>
                        </a>
                    </li>
                @endif

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
