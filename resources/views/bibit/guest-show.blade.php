@extends('shared.layout')
@section('title', 'Bibit')
@section('content')
<div class="container my-5">
    <h1 class='mb-5'>
        <i class='fa fa-tree'></i>
        Bibit
        <p class="small text-muted"> {{ $bibit->spesies }} </p>
    </h1>

    <div class="card">
        <div class="card-body">
            <dl>
                <dt> Famili: </dt>
                <dd> {{ $bibit->famili }} </dd>
                <dt> Deskripsi: </dt>
                <dd> {{ $bibit->deskripsi }} </dd>
                <dt> Daun: </dt>
                <dd> {{ $bibit->daun }} </dd>
                <dt> Bunga: </dt>
                <dd> {{ $bibit->bunga }} </dd>
                <dt> Buah: </dt>
                <dd> {{ $bibit->buah }} </dd>
                <dt> Ekologi: </dt>
                <dd> {{ $bibit->ekologi }} </dd>
                <dt> Penyebaran: </dt>
                <dd> {{ $bibit->penyebaran }} </dd>
                <dt> Kelimpahan: </dt>
                <dd> {{ $bibit->kelimpahan }} </dd>
                <dt> Manfaat: </dt>
                <dd> {{ $bibit->manfaat }} </dd>
                <dt> Catatan: </dt>
                <dd> {{ $bibit->catatan }} </dd>
            </dl>
        </div>
    </div>
</div>
@endsection
