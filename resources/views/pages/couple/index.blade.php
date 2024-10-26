@extends('layouts.main')

@section('navbar')
    @include('partials.navbar', ['breadcrumbs' => $breadcrumbs['urls']]);
@endsection

@section('content')
    <div class="col-md-12 mb-lg-0 mb-4">
        <div class="card mt-4">
            <div class="card-header pb-0 p-3">
                <div class="row">
                    <div class="col-6 d-flex align-items-center">
                        <h6 class="mb-0">{{ $breadcrumbs['table_title'] }}</h6>
                    </div>
                    <div class="col-6 text-end">
                        <a class="btn bg-gradient-dark mb-0" href="{{ route('pages.couple.create') }}"><i
                                class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New Couple</a>
                    </div>
                </div>
            </div>
            <div class="card-body p-3">
                <table class="table table-responsive data-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Groom Name</th>
                            <th>Bride Name</th>
                            <th width="105px"></th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            responsive: true,
            ajax: {
                url: "{{ route('pages.couple.datatables') }}",
                error: function(xhr, error, code) {
                    alert("Timeout saat mengambil data, silahkan refresh")
                }
            },
            columns: [
                {data: 'name', name: 'name'},
                {data: 'groom_name', name: 'groom_name'},
                {data: 'bride_name', name: 'bride_name'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    </script>
@endsection
