<div class="position-fixed bottom-10 end-1 z-index-2">
    {{-- <div class="card-body p-3" style="display: none;">
        <div class="row">
            <div class="col-lg-3 col-sm-6 col-12">
                <button class="btn bg-gradient-success w-100 mb-0 toast-btn" id="successToastBtn" type="button"
                    data-target="successToast">Success</button>
            </div>
            <div class="col-lg-3 col-sm-6 col-12 mt-sm-0 mt-2">
                <button class="btn bg-gradient-info w-100 mb-0 toast-btn" type="button" id="infoToastBtn"
                    data-target="infoToast">Info</button>
            </div>
            <div class="col-lg-3 col-sm-6 col-12 mt-lg-0 mt-2">
                <button class="btn bg-gradient-warning w-100 mb-0 toast-btn" type="button" id="warningToastBtn"
                    data-target="warningToast">Warning</button>
            </div>
            <div class="col-lg-3 col-sm-6 col-12 mt-lg-0 mt-2">
                <button class="btn bg-gradient-danger w-100 mb-0 toast-btn" type="button" id="dangerToastBtn"
                    data-target="dangerToast">Danger</button>
            </div>
        </div>
    </div> --}}
    @if (Session::has('message'))

        @if (session()->get('alert-type') == 'success')
            <div class="toast p-2 bg-white" role="alert" id="successToast">
                <div class="toast-header border-0">
                    <i class="material-icons text-success me-2">
                        check
                    </i>
                    <span class="me-auto font-weight-bold">Yeay, Success! </span>
                    {{-- <small class="text-body">11 mins ago</small> --}}
                    <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
                </div>

                <div class="toast-body">
                    {{ session()->get('message') }}
                </div>
            </div>
        @elseif (session()->get('alert-type') == 'info')
            <div class="toast p-2 mt-2 bg-gradient-info" role="alert" id="infoToast">
                <div class="toast-header bg-transparent border-0">
                    <i class="material-icons text-white me-2">
                        notifications
                    </i>
                    <span class="me-auto text-white font-weight-bold">FYI </span>
                    {{-- <small class="text-white">11 mins ago</small> --}}
                    <i class="fas fa-times text-md text-white ms-3 cursor-pointer" data-bs-dismiss="toast"
                        aria-label="Close"></i>
                </div>
                <hr class="horizontal light m-0">
                <div class="toast-body text-white">
                    {{ session()->get('message') }}
                </div>
            </div>
        @elseif (session()->get('alert-type') == 'warning')
            <div class="toast p-2 mt-2 bg-white" role="alert" id="warningToast">
                <div class="toast-header border-0">
                    <i class="material-icons text-warning me-2">
                        travel_explore
                    </i>
                    <span class="me-auto font-weight-bold">Be Careful! </span>
                    {{-- <small class="text-body">11 mins ago</small> --}}
                    <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
                </div>

                <div class="toast-body">
                    {{ session()->get('message') }}
                </div>
            </div>
        @elseif (count($errors) > 0)
            <div class="toast p-2 mt-2 bg-white" role="alert" id="dangerToast">
                <div class="toast-header border-0">
                    <i class="material-icons text-danger me-2">
                        campaign
                    </i>
                    <span class="me-auto text-gradient text-danger font-weight-bold"><strong>Oppps!</strong> Ada
                        beberapa kesalahan yang harus diperbaiki. </span>
                    <small class="text-body">11 mins ago</small>
                    <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
                </div>

                <div class="toast-body">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
    @endif
</div>
