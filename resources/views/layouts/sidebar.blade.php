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
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="fa fa-th-large pr-3"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                @if (auth()->check() && auth()->user()->role == 0)
                    <li class="nav-item">
                        <a href="{{ route('users_table') }}" class="nav-link">
                            <i class="fas fa-solid fa-users nav-icon pr-3"></i>
                            <p>Users</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('doctors_table') }}" class="nav-link">
                            <i class="fa fa-user pr-3"></i>
                            <p>Doctors</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('department_table') }}" class="nav-link">
                            <i class="fa fa-building pr-3"></i>
                            <p>Departments</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('schedule.index') }}" class="nav-link">
                            <i class="far fa-calendar pr-3"></i>
                            <p>Schedules</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('patient.index', ['id' => auth()->user()->id]) }}" class="nav-link">
                            <i class="fa fa-wheelchair pr-3"></i>
                            <p>Patients</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('trash.index') }}" class="nav-link">
                            <i class="fa fa-trash pr-3"></i>
                            <p>Trash</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-copy pr-3"></i>
                            <p>
                                Web Management
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('page.index') }}" class="nav-link">
                                    <i class="fa fa-file nav-icon"></i>
                                    <p>Page Management</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('menubar.index') }}" class="nav-link">
                                    <i class="fa fa-bars nav-icon"></i>
                                    <p>Menu Management</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('menubar.index') }}" class="nav-link">
                                    <i class="fa fa-question-circle nav-icon"></i>
                                    <p>FAQ's Management</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if (auth()->check() && auth()->user()->role == 1)
                    <li class="nav-item">
                        <a href="{{ route('schedule.show', ['schedule' => auth()->user()->doctor->id]) }}"
                            class="nav-link">
                            <i class="far fa-calendar pr-3"></i>
                            <p>Schedules</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('appointment.show', ['appointment' => auth()->user()->doctor->id]) }}"
                            class="nav-link">
                            <i class="fa fa-address-book pr-3"></i>
                            <p>Appointments</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('patient.index', ['id' => auth()->user()->id]) }}" class="nav-link">
                            <i class="fa fa-users pr-2"></i>
                            <p>My Patients</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-wrench pr-3"></i>
                            <p>
                                Settings
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('edit_doctor', ['doctor_id' => auth()->user()->doctor->id]) }}"
                                    class="nav-link">
                                    <i class="fas fa-user-edit nav-icon"></i>
                                    <p>Edit Profile</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('change_form', ['id' => auth()->user()->doctor->id]) }}"
                                    class="nav-link">
                                    <i class="fas fa-unlock nav-icon"></i>
                                    <p>Change Password</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
