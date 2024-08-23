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
        @if (!empty($user->email))
        is-filled focused is-focused
        @endif">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name ?? '' }}">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="input-group input-group-outline my-3 @if(!empty($user->email))
            is-filled focused is-focused
        @endif">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email ?? '' }}">
        </div>
    </div>
</div>

@if (Request::route()->getName() == 'pages.user.create')

<div class="row">
    <div class="col-md-6">
        <div class="input-group input-group-outline my-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="input-group input-group-outline my-3">
            <label class="form-label">Confirm Password</label>
            <input type="password" name="confirmPassword" class="form-control">
        </div>
    </div>
</div>
@endif

<div class='form-group row'>
    <div class="col-md-5">
        <a href="{{ url()->previous() }}" class="btn btn-lg btn-block btn-outline-primary">Kembali</a>
    </div>
    <div class="col-md-4">
        <input type="submit" value="Simpan" class="btn btn-lg btn-block btn-primary">
    </div>
</div>
