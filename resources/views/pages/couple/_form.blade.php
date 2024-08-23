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


<div class="row">
    <div class="col-md-6">
        <div class="input-group input-group-outline my-3
        @if (!empty($couple->name))
            is-filled focused is-focused
        @endif">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $couple->name ?? '' }}">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="input-group input-group-outline my-3 @if(!empty($couple->groom_name))
            is-filled focused is-focused
        @endif">
            <label class="form-label">Groom Name</label>
            <input type="groom_name" name="groom_name" class="form-control" value="{{ $couple->groom_name ?? '' }}">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="input-group input-group-outline my-3 @if(!empty($couple->groom_name))
            is-filled focused is-focused
        @endif">
            <label class="form-label">Bride Name</label>
            <input type="bride_name" name="bride_name" class="form-control" value="{{ $couple->bride_name ?? '' }}">
        </div>
    </div>
</div>

<div class='form-group row'>
    <div class="col-md-5">
        <a href="{{ url()->previous() }}" class="btn btn-lg btn-block btn-outline-primary">Kembali</a>
    </div>
    <div class="col-md-4">
        <input type="submit" value="Simpan" class="btn btn-lg btn-block btn-primary">
    </div>
</div>
