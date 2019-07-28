@extends('shared.layout')
@section('title', 'Detail Pengalaman')
@section('content')
<div class="container my-5">
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
