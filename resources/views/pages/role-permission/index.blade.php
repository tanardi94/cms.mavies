@extends('layouts.main')


@section('navbar')
    @include('partials.navbar', ['breadcrumbs' => $breadcrumbs])
@endsection

@section('content')
<div class="col-md-12 mb-lg-0 mb-4">
    <div class="card mt-4">
        <div class="card-header pb-0 p-3">
            <div class="row">
                <div class="col-6 d-flex align-items-center">
                </div>
                <div class="col-6 text-end">
                    <a class="btn bg-gradient-dark mb-0" href="{{ route('pages.role.create') }}"><i
                            class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New User</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
