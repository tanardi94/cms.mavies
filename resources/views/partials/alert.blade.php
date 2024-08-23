@if (Session::has('message'))

    @if (session()->get('alert-type') == 'success')
        <div class="alert alert-primary alert-dismissible text-white" role="alert">
            <span class="text-sm">{{ Session::get('message') }}</span>
            <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @elseif (session()->get('alert-type') == 'danger')
        <div class="alert alert-danger alert-dismissible text-white" role="alert">
            <span class="text-sm">{{ Session::get('message') }}</span>
            <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @elseif (session()->get('alert-type') == 'warning')
        <div class="alert alert-warning alert-dismissible text-white" role="alert">
            <span class="text-sm">{{ Session::get('message') }}</span>
            <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @elseif (session()->get('alert-type') == 'info')
        <div class="alert alert-info alert-dismissible text-white" role="alert">
            <span class="text-sm">{{ Session::get('message') }}</span>
            <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
@endif
