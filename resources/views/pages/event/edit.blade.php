@extends('layouts.main')



@section('content')
<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Update Event Info</h4>
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>


<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            {!! Form::model($event, ['route' => ['pages.event.update', $event->uuid], 'method' => 'PATCH', 'files' => true, 'enctype' => 'multipart/form-data']) !!}
                @include('pages.event._form', ['submitButtonText' => 'Simpan'])
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
