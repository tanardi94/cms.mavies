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
                    <h6 class="mb-0">{{ $breadcrumbs['table_title']}}</h6>
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
                        <th>Tag</th>
                        <th>Couples</th>
                        <th>Address</th>
                        <th>Date</th>
                        <th>Schedule</th>
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
<script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>
<script src="{{ asset('js/datatables.min.js')}}"></script>

<script>
    $(document).ready(function (){
        $('.table-event').DataTable({
            autoWidth: false,
            processing: true,
            responsive: true,
            serverSide: true,
            ajax: {
                url: "{{ route('pages.event.datatables') }}",
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
                { data: 'name', name: 'Event name' },
                { data: 'tag', name: 'Event name' },
                { data: 'couple', name: 'Event name' },
                { data: 'address', name: 'Event name' },
                { data: 'eventDate', name: 'Event name' },
                { data: 'eventSchedule', name: 'Event name' },
                { data: 'action', name: 'action'},
            ]
        })
    })
</script>
@endsection
