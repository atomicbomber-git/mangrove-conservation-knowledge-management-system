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
                <dt> Bibit </dt>
                <dd>
                    <table class="table table-sm table-bordered table-striped">
                        <thead class="thead thead-dark">
                            <tr>
                                <th> # </th>
                                <th> Nama </th>
                                <th class="text-right"> Jumlah </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($programPemerintah->bibits as $bibit)
                            <tr>
                                <td> {{ $loop->iteration }} </td>
                                <td> {{ $bibit->nama }} </td>
                                <td class="text-right"> {{ $bibit->data->jumlah }} </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </dd>
            </dl>
        </div>
    </div>
</div>
@endsection
