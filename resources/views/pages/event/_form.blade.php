@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Oppps!</strong> Ada beberapa kesalahan yang harus diperbaiki.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


<div class="col-lg-8 col-xlg-9 col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="form-group mb-4">
                {!! Form::label('inputGroomName', 'Event Name:', ['class' => "col-sm-4 control-label"]) !!}
                <div class="col-md-12 border-bottom p-0">
                    {!! Form::text('name', null, [ 'class' => "col-md-8 p-0 border-0 form-control{{ $errors->has('name') ? ' is-invalid' : '' }} pl-2", 'placeholder' => 'Insert Your Event Name']) !!}
                    </div>
            </div>

            <div class="form-group mb-4">
                {!! Form::label('inputGroomName', 'Tag:', ['class' => "col-sm-4 control-label"]) !!}
                <div class="col-md-12 border-bottom p-0">
                    {!! Form::text('tag', null, [ 'class' => "col-md-8 p-0 border-0 form-control{{ $errors->has('tag') ? ' is-invalid' : '' }} pl-2", 'placeholder' => 'Insert Your Tag']) !!}
                    </div>
            </div>

            <div class="form-group mb-4">
                {!! Form::label('inputGroomName', 'Address:', ['class' => "col-sm-4 control-label"]) !!}
                <div class="col-md-12 border-bottom p-0">
                    {!! Form::text('address', null, [ 'class' => "col-md-8 p-0 border-0 form-control{{ $errors->has('address') ? ' is-invalid' : '' }} pl-2", 'placeholder' => 'Insert Your Event Address']) !!}
                    </div>
            </div>

            <div class="form-group mb-4">
                {!! Form::label('inputKategori', 'Couple:', ['class' => "col-sm-4 control-label"]) !!}
                <div class="col-md-12 border-bottom p-0">

                    {!! Form::select('couple', $couples, null, ['class' => "col-md-8 p-0 border-0 form-control{{ $errors->has('couple') ? ' is-invalid' : '' }} pl-2"]) !!}
                    </div>
            </div>

            <div class="form-group mb-4">
                {!! Form::label('inputKategori', 'Couple:', ['class' => "col-sm-4 control-label"]) !!}
                <div class="col-md-12 border-bottom p-0">

                    {!! Form::select('template', ['Type 1', 'Type 2', 'Type 3'], null, ['class' => "col-md-8 p-0 border-0 form-control{{ $errors->has('template') ? ' is-invalid' : '' }} pl-2"]) !!}
                    </div>
            </div>

            <div class="form-group mb-4">
                {!! Form::label('inputTanggalMulai', 'Event Date:', ['class' => "col-sm-4 control-label"]) !!}
                <div class="col-md-12 border-bottom p-0">
                    {{ Form::date('dates', null, ['id' => 'weddingStart', 'class' => 'form-control']) }}
                 </div>
            </div>

            <div class="form-group mb-4">
                {!! Form::label('inputTanggalMulai', 'Start Time:', ['class' => "col-sm-4 control-label"]) !!}
                <div class="col-md-12 border-bottom p-0">
                    {{ Form::time('timeStart', null, ['id' => 'weddingStart', 'class' => 'form-control']) }}
                 </div>
            </div>

            <div class="form-group mb-4">
                {!! Form::label('inputTanggalMulai', 'End Time:', ['class' => "col-sm-4 control-label"]) !!}
                <div class="col-md-12 border-bottom p-0">
                    {{ Form::time('timeEnd', null, ['id' => 'weddingEnd', 'class' => 'form-control']) }}
                 </div>
            </div>

        </div>
    </div>
</div>

<div class='form-group row'>
    <div class="col-md-6">
    <a href="{{ url()->previous() }}" class="btn btn-lg btn-block btn-outline-primary">Kembali</a>
    </div>
    <div class="col-md-6">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-lg btn-block btn-primary']) !!}
    </div>
</div>
