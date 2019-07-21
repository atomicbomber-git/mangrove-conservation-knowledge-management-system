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

    <div class="card">
        <div class="card-body">
            <h1 class="mb-5">
                {{ $pengalaman->tema }}
            </h1>

            <dl>
                <dt> Cerita </dt>
                <dd> {{ $pengalaman->cerita }} </dd>

                <dt> Pengaduan </dt>
                <dd> {{ $pengalaman->pengaduan }} </dd>

                <dt> Keluhan </dt>
                <dd> {{ $pengalaman->keluhan }} </dd>

                <dt> Saran </dt>
                <dd> {{ $pengalaman->saran }} </dd>
            </dl>
        </div>
    </div>

</div>
@endsection
