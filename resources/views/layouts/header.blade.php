<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item  ml-2" style="font-size: 16px">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        {{-- <li class="nav-item d-none d-sm-inline-block">
      <a href="{{route('home')}}" class="nav-link">Home</a>
    </li> --}}
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown mx-2">
            <a href="{{ route('markasread') }}" class="nav-link" data-toggle="dropdown">
                <span class="badge navbar-badge"
                    style="width: 15px; height: 15px; color: red; position: absolute; top: 0; right: 0;">

                    @if (auth()->user()->role == 1)
                        {{ auth()->user()->doctor->unreadnotifications->count() > 0
                            ? auth()->user()->doctor->unreadnotifications->count()
                            : '' }}
                    @elseif(auth()->user()->role == 0)
                        {{ auth()->user()->unreadnotifications->count() > 0
                            ? auth()->user()->unreadnotifications->count()
                            : '' }}
                    @endif
                </span>

                <i class="far fa-bell"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="width: 800px">
                @if (auth()->user()->role == 1)
                    @forelse(auth()->user()->doctor->unreadnotifications as $notification)
                        <a href="#" class="dropdown-item">
                            <div class="notification-content">
                                <div class="notification-details">
                                    <span>{{ $notification->data['name'] }} made an appointment for</span>
                                    <span class="date">{{ $notification->data['date_bs'] }}</span>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                    @empty
                        <span class="dropdown-item dropdown-header">No New Notifications</span>
                    @endforelse
                @elseif(auth()->user()->role == 0)
                    @forelse(auth()->user()->unreadnotifications as $notification)
                        <a href="#" class="dropdown-item">
                            <div class="notification-content">
                                <div class="notification-details">
                                    <span>{{ $notification->data['name'] }} made an appointment for</span>
                                    <span class="date">{{ $notification->data['contact'] }}</span>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                    @empty
                        <span class="dropdown-item dropdown-header">No New Notifications</span>
                    @endforelse
                @endif
                @if (auth()->user()->role == 1)
                    @if (auth()->user()->doctor->unreadnotifications->isNotEmpty())
                        <a class="dropdown-item dropdown-header text-center" href="{{ route('markasread') }}">Mark all
                            as
                            read.</a>
                    @endif
                @elseif(auth()->user()->role == 0)
                    @if (auth()->user()->unreadnotifications->isNotEmpty())
                        <a class="dropdown-item dropdown-header text-center" href="{{ route('markasread') }}">Mark all
                            as
                            read.</a>
                    @endif
                @endif

            </div>
        </li>
        <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link"
                onclick="event.preventDefault();
      document.getElementById('logout-form').submit();">
                {{-- <i class="nav-icon fas fa-sign-out-alt pr-1"></i> --}}
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
