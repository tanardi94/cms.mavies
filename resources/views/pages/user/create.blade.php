@extends('layouts.main')

@section('navbar')
    @include('partials.navbar', ['breadcrumbs' => $breadcrumbs])
@endsection

@section('content')

<div class="row">
    <div class="col-sm-12">
        <form action="{{ route('pages.user.store') }}" method="POST">
            @csrf
            @include('pages.user._form', ['submitButtonText' => 'Simpan'])
        </form>
    </div>
</div>
@endsection
