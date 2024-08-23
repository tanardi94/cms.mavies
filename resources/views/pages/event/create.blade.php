@extends('layouts.admin')



@section('content')
<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Register Event</h4>
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>


<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            {!! Form::open(['route' => 'event.store', 'enctype' => 'multipart/form-data', 'files' => true]) !!}
                @include('pages.event._form', ['submitButtonText' => 'Simpan', 'couples' => $couples])
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
