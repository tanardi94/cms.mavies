@extends('layouts.main')

@section('navbar')
    @include('partials.navbar', ['breadcrumbs' => $breadcrumbs])
@endsection

@section('content')

<div class="row">
    <div class="col-sm-12">
        <form action="{{ route('pages.category.update', $category->uuid) }}" method="POST">
            @csrf
            @method('PUT')
            @include('pages.category._form', ['submitButtonText' => 'Simpan'])
        </form>
    </div>
</div>
@endsection
