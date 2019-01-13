@extends('shared.layout')
@section('title', 'Kelola Halaman Mangrove')
@section('content')
<div class="container my-5">
    <h1 class='mb-5'>
        <i class='fa fa-pencil'></i>
        Sunting Halaman Mangrove
    </h1>

    <div class="card">
        <div class="card-header">
            <i class="fa fa-pencil"></i> Sunting Halaman Mangrove
        </div>
        <div class="card-body" id="app">
            <mangrove-edit/>
        </div>
    </div>
</div>

@javascript('records', $records)
@endsection