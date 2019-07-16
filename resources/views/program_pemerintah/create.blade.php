@extends('shared.layout')
@section('title', 'Tambah Program Pemerintah')
@section('content')
<div class="container my-5">
    <h1 class='mb-5'>
        <i class='fa fa-plus'></i>
        Tambah Program Pemerintah
    </h1>

    <div class="card">
        <div class="card-header">
            <i class="fa fa-plus"></i>
            Tambah Program Pemerintah
        </div>
        <div class="card-body" id="app">
            <program-pemerintah-create
                :original_bibits='{{ json_encode($bibits) }}'
                submit_url="{{ route("program-pemerintah.store") }}"
                redirect_url="{{ route("program-pemerintah.index") }}"
                >
            </program-pemerintah-create>
        </div>
    </div>
</div>
@endsection
