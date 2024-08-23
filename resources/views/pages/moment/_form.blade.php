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
                    {!! Form::label('inputName', 'Name:', ['class' => "col-sm-4 control-label"]) !!}
                    <div class="col-md-12 border-bottom p-0">
                        {!! Form::text('name', null, [ 'class' => "col-md-8 p-0 border-0 form-control{{ $errors->has('name') ? ' is-invalid' : '' }} pl-2", 'placeholder' => 'Insert Your Groom Name']) !!}
                        </div>
                </div>

                <div class="form-group mb-4">
                    {!! Form::label('inputDeskripsi', 'Deskripsi:', ['class' => "col-sm-4 control-label"]) !!}
                    <div class="col-md-12 border-bottom p-0">
                        {!! Form::textarea('description', null, ['class' => "p-0 border-0 form-control pl-2", 'placeholder' => 'Tulis Deskripsi', 'id' => 'deskripsi']) !!}
                        </div>
                </div>

                <div class="form-group mb-4">
                    {!! Form::label('inputKategori', 'Event:', ['class' => "col-sm-4 control-label"]) !!}
                    <div class="col-md-12 border-bottom p-0">

                        {!! Form::select('event', $events, null, ['class' => "col-md-8 p-0 border-0 form-control{{ $errors->has('event') ? ' is-invalid' : '' }} pl-2"]) !!}
                        </div>
                </div>

                <div class="form-group mb-4">
                    {!! Form::label('inputTanggalMulai', 'Event Date:', ['class' => "col-sm-4 control-label"]) !!}
                    <div class="col-md-12 border-bottom p-0">
                        {{ Form::date('date', null, ['id' => 'weddingStart', 'class' => 'form-control']) }}
                     </div>
                </div>

                <div class="form-group mb-4">
                    {!! Form::label('inputKategori', 'Gambar:', ['class' => "col-sm-4 control-label"]) !!}
                    <div class="col-md-12 border-bottom p-0">

                        {!! Form::file('image', null, ['required' => true, 'class' => "col-md-8 p-0 border-0 form-control{{ $errors->has('image') ? ' is-invalid' : '' }} pl-2"]) !!}
                        </div>
                </div>


                {{-- <div class="form-group mb-4">
                    {!! Form::label('inputKategori', 'Gambar:', ['class' => "col-sm-4 control-label"]) !!}
                    <div class="col-md-12 border-bottom p-0">

                        <input type="file" name="gambar[]" multiple class="form-control" accept="image/*">
                        @if ($errors->has('files'))
                            @foreach ($errors->get('files') as $error)
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $error }}</strong>
                            </span>
                            @endforeach
                        @endif
                        </div>
                </div> --}}

                {{-- <div class="form-group mb-4">
                    {!! Form::label('inputKategori', 'Kategori:', ['class' => "col-sm-4 control-label"]) !!}
                    <div class="col-md-12 border-bottom p-0">

                        {!! Form::select('category', $categories, null, ['class' => "col-md-8 p-0 border-0 form-control{{ $errors->has('category') ? ' is-invalid' : '' }} pl-2"]) !!}
                        </div>
                </div> --}}

                {{-- <div class="form-group mb-4">
                    {!! Form::label('inputHarga', 'Harga:', ['class' => "col-sm-4 control-label"]) !!}
                    <div class="col-md-12 border-bottom p-0">
                        {!! Form::number('price', null, ['class' => "col-md-8 p-0 border-0 form-control{{ $errors->has('price') ? ' is-invalid' : '' }} pl-2", 'placeholder' => 'Tulis Harga']) !!}
                        </div>
                </div> --}}
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


@section('scripts')
<script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
<script>

    $(document).ready(function(){
        tinymce.init({
            selector:'#deskripsi',
            force_br_newlines : true,
            force_p_newlines : false,
            forced_root_block : '',
            plugins: 'lists paste',
            toolbar: 'numlist bullist bold underline italic redo undo',
            paste_merge_formats: true
        });
    });
</script>

@endsection
