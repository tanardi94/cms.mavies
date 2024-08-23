@extends('layouts.admin')

@section('extra-head')
<link rel="stylesheet" href="{{ asset('css/datatables.min.css') }}">
@endsection

@section('content')

    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Moment</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <div class="d-md-flex">
                    <ol class="breadcrumb ms-auto">
                        <li><a href="#" class="fw-normal"></a></li>
                    </ol>
                    <a href="{{ route('moment.create') }}"
                        class="btn btn-primary d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">Register moment</a>
                </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    </div>

<div class="container-fluid">
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <h3 class="box-title">Tabel Moment</h3>
            <div class="table-responsive">

                <table class="table text-nowrap table-moment">
                    <thead>
                        <tr>
                            <th>Event Name</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Date</th>
                            {{-- <th>SKU</th>
                            <th>Kategori</th> --}}
                            {{-- <th>Deskripsi</th> --}}
                            {{-- <th>Ukuran</th> --}}
                            {{-- <th>Harga</th> --}}
                            {{-- <th>Stok</th> --}}
                            {{-- <th>Status</th> --}}
                            {{-- <th>Trending</th> --}}
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>



@endsection

@section('scripts')
<script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>
<script src="{{ asset('js/datatables.min.js')}}"></script>

<script>
    $(document).ready(function (){
        $('.table-moment').DataTable({
            autoWidth: false,
            processing: true,
            responsive: true,
            serverSide: true,
            ajax: {
                url: "{{ route('moment.datatables') }}",
                error: function(xhr, error, code) {
                    alert("Timeout saat mengambil data, silahkan refresh")
                }
            },
            columnDefs: [
                {
                    "className": "text-center",
                    "width": "10%"
                },
            ],
            columns: [
                { data: 'event', name: 'event name' },
                { data: 'name', name: 'title' },
                { data: 'description', name: 'description' },
                { data: 'image', name: 'image' },
                { data: 'date', name: 'date' },
                // { data: 'SKU', name: 'code'},
                // { data: 'category', name: 'category' },
                // // { data: 'shortened_desc', name: 'description'},

                // { data: 'formatted_price', name: 'price' },
                // { data: 'trending', name: 'is_trending' },
                { data: 'action', name: 'action'},
            ]
        })
    })
</script>
@endsection
