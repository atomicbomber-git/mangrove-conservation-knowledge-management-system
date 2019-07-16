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
        <div class="card-header">
            <i class="fa fa-product-hunt"></i>
            Program Pemerintah
        </div>
        <div class="card-body">
            @inject('formatter', 'App\Helpers\FormatterInterface')
            <dl>
                <dt> Nama </dt>
                <dd> {{ $programPemerintah->nama }} </dd>
                <dt> Dana </dt>
                <dd> {{ $formatter->currency($programPemerintah->dana) }} </dd>
                <dt> Durasi </dt>
                <dd>
                    {{ $formatter->date($programPemerintah->tanggal_mulai) }} -
                    {{ $formatter->date($programPemerintah->tanggal_selesai) }}
                </dd>
                <dt> Penanggung Jawab </dt>
                <dd> {{ $programPemerintah->penanggung_jawab }} </dd>

                <dt> Nama Instansi </dt>
                <dd> {{ $programPemerintah->nama_instansi }} </dd>

                <dt> Nama Instansi Penerima </dt>
                <dd> {{ $programPemerintah->nama_instansi_penerima }} </dd>

                <dt> Penanggung Jawab Penerima </dt>
                <dd> {{ $programPemerintah->penanggung_jawab_penerima }} </dd>

                <dt> Bentuk </dt>
                <dd> {{ $programPemerintah->bentuk }} </dd>

                <dt> Hasil </dt>
                <dd> {{ $programPemerintah->hasil }} </dd>

                <dt> Persentase Hasil (%) </dt>
                <dd> {{ $programPemerintah->persentase_hasil }} % </dd>
            </dl>
        </div>
    </div>
</div>
@endsection
