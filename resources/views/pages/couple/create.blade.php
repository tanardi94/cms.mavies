@extends('layouts.main')

@section('navbar')
    @include('partials.navbar', ['breadcrumbs' => $breadcrumbs])
@endsection

@section('content')

<div class="row">
    <div class="col-sm-12">
        <form action="{{ route('pages.couple.store') }}" method="POST">
            @csrf
            @include('pages.couple._form', ['submitButtonText' => 'Simpan'])
        </form>
    </div>
</div>
@endsection
