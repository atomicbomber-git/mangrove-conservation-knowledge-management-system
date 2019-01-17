@extends('shared.layout')
@section('title', 'Tambah Hasil Penelitian')
@section('content')
<div class="container my-5">
    <h1 class='mb-5'>
        <i class='fa fa-plus'></i>
        Tambah Hasil Penelitian
    </h1>

    @include('shared.message', ['session_key' => 'message.success', 'state' => 'success'])

    <div class="card" style="max-width: 40rem">
        <div class="card-header">
            <i class="fa fa-plus"></i>
            Tambah Hasil Penelitian
        </div>
        <div class="card-body" id="app">
            <research-create/>
        </div>
    </div>

    @javascript('currentYear', today()->format('Y'))
    @javascript('categories', $categories)
    @javascript('user', auth()->user())
</div>
@endsection