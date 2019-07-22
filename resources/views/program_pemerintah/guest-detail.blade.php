@extends('shared.layout')
@section('title', 'Program Pemerintah')
@section('content')
<div class="container my-5">
    <h1 class='mb-5'>
        <i class='fa fa-product-hunt'></i>
        Program Pemerintah
        <p class="small text-muted"> {{ $programPemerintah->nama }} </p>
    </h1>

    <div class="card">
        <div class="card-body">
            @include('program_pemerintah.detail-component')
        </div>
    </div>
</div>
@endsection
