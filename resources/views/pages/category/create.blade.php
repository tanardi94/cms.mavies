@extends('layouts.main')

@section('navbar')
    @include('partials.navbar', ['breadcrumbs' => $breadcrumbs])
@endsection

@section('content')

<div class="row">
    <div class="col-sm-12">
        <form action="{{ route('pages.category.store') }}" method="POST">
            @csrf
            @include('pages.category._form', ['submitButtonText' => 'Simpan', 'parents' => $parents])
        </form>
    </div>
</div>
@endsection
