@extends('shared.layout')
@section('title', 'Sunting Hasil Penelitian')
@section('content')
<div class="container my-5">
    <h1 class='mb-5'>
        <i class='fa fa-pencil'></i>
        Sunting Hasil Penelitian
    </h1>

    @include('shared.message', ['session_key' => 'message.success', 'state' => 'success'])

    <div class="card" style="max-width: 40rem">
        <div class="card-header">
            <i class="fa fa-pencil"></i>
            Sunting Hasil Penelitian
        </div>
        <div class="card-body" id="app">
            <user-research-edit/>
        </div>
    </div>

    @javascript('categories', $categories)
    @javascript('user', auth()->user())
    @javascript('research', $research)
</div>
@endsection