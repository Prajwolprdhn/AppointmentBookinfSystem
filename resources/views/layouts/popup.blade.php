@if (session('success'))
    <div class="alert alert-success d-flex align-items-center" role="alert"
        style="position:absolute;
                  bottom:40px;
                  right:25px;
                  z-index: 9999;">
        <i class="fas fa-check pr-3"></i>
        <div>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif

@if (session('flash-message'))
    <div class="alert alert-success d-flex align-items-center" role="alert"
        style="position:absolute;
                  top:40px;
                  right:25px;
                  z-index: 9999;">
        <i class="fas fa-times pr-3"></i>
        <div>
            {{ session('flash-message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif
