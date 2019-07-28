@extends('shared.layout')
@section('title', 'Detail Pengalaman')
@section('content')
<div class="container my-5">
    <div class="mb-4">
        <a class="btn btn-default btn-sm" href="{{ route('pengalaman.guest.index') }}">
            <i class="fa fa-arrow-left"></i>
            Kembali ke Daftar Pengalaman
        </a>
    </div>

    <h1 class='mb-5'>
        <i class='fa fa-address-book'></i>
        Pengalaman
        <p class="small text-muted"> {{ $pengalaman->judul }} </p>
    </h1>

    <div class="card">
        <div class="card-body">
            @include('pengalaman.detail-content')
        </div>
    </div>

</div>
@endsection
