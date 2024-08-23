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
                {!! Form::label('inputEvent', 'Event:', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-md-12 border-bottom p-0">

                    {!! Form::select('event', $events, null, ['class' => "col-md-8 p-0 border-0 form-control{{ $errors->has('event') ? ' is-invalid' : '' }} pl-2"]) !!}
                </div>
            </div>


            {{-- <div class="form-group mb-4">
                {!! Form::label('inputImage', 'Image Upload:', ['class' => "col-sm-4 control-label"]) !!}
                <div class="col-md-12 border-bottom p-0 dropzone" id="image-upload">

                 </div>
            </div> --}}

            <div class="needsclick dropzone" id="document-dropzone">

            </div>

            <div class="form-group mb-4">
                {!! Form::label('inputType', 'Type:', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-md-12 border-bottom p-0">

                    {!! Form::select('type', $types, null, ['class' => "col-md-8 p-0 border-0 form-control{{ $errors->has('type') ? ' is-invalid' : '' }} pl-2", "id" => "image-type"]) !!}
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
