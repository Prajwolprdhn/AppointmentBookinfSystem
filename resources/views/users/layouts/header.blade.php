{{-- @foreach ($menus as $menu)
    @if ($menu->type == 'Page')
        {{ dd($menu->page_id, $menu) }}
    @endif
@endforeach --}}
@inject('menubar_helper', 'App\Helpers\MenubarHelper')

<div id="spinner"
    class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>

<div class="container-fluid sticky-top" style="background-color: rgb(19, 99, 198);">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark p-0">
            <a href="{{ route('main') }}" class="navbar-brand">
                <h3 class="text-white">Appointment Booking System</h3>
            </a>
            <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto">
                    @foreach ($menubar_helper->show() as $menu)
                        @if ($menu->type == 'Module')
                            <a href="{{ route($menu->modules->link) }}"
                                class="nav-item nav-link active">{{ $menu->name }}</a>
                        @elseif($menu->type == 'Page')
                            <a href="{{ route('dynamic_view', ['id' => $menu->page_id]) }}"
                                class="nav-item nav-link active">{{ $menu->name }}</a>
                        @else
                            <a href="{{ $menu->external_link }}"
                                class="nav-item nav-link active">{{ $menu->name }}</a>
                        @endif
                    @endforeach
                </div>
            </div>
        </nav>
    </div>
</div>
