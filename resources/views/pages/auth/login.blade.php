@extends('layouts.login')


@section('content')
    <div class="card-body">
        <form action="{{ route('auth.login.post') }}" role="form" class="text-start" method="POST">
            @csrf
            <div class="input-group input-group-outline my-3">
                <label class="form-label">Email</label>
                <input name="email" type="email" class="form-control">
            </div>
            <div class="input-group input-group-outline mb-3">
                <label class="form-label">Password</label>
                <input name="password" type="password" class="form-control">
            </div>
            <div class="form-check form-switch d-flex align-items-center mb-3">
                <input class="form-check-input" type="checkbox" id="rememberMe" checked>
                <label class="form-check-label mb-0 ms-3" for="rememberMe">Remember me</label>
            </div>

            @if (count($errors) > 0)
                <span class="invalid-feedback">
                    @foreach (errors as $error)

                        <strong>{{ $error }}</strong>
                    @endforeach
                </span>
            @endif


            <div class="text-center">
                <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Sign in</button>
            </div>
            <p class="mt-4 text-sm text-center">
                Don't have an account?
                <a href="{{ route('auth.register.index') }}" class="text-primary text-gradient font-weight-bold">Sign up</a>
            </p>
        </form>
    </div>
@endsection
