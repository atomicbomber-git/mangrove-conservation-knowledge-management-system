@extends('shared.layout')
@section('title', 'Bibit')
@section('content')
<div class="container my-5">
    <div class="mb-4">
        <a class="btn btn-default btn-sm" href="{{ route('bibit.guest.index') }}">
            <i class="fa fa-arrow-left"></i>
            Kembali ke Daftar Seluruh Bibit
        </a>
    </div>

    <h1 class='mb-5'>
        <i class='fa fa-tree'></i>
        Bibit
        <p class="small text-muted"> {{ $bibit->spesies }} </p>
    </h1>

    <div class="card">
        <div class="card-body">
            @include('bibit.show-component')
        </div>
    </div>
</div>
@endsection
