@extends('shared.layout')
@section('title', 'Tambah Artikel')
@section('content')
<div class="container my-5">
    <h1 class='mb-5'>
        <i class='fa fa-plus'></i>
        Tambah Artikel
    </h1>

    @include('shared.message', ['session_key' => 'message.success', 'state' => 'success'])

    <div class="card">
        <div class="card-header">
            <i class="fa fa-plus"></i>
            Tambah Artikel
        </div>
        <div class="card-body">
            <div id="app">
                <user-article-create/>
            </div>
        </div>
    </div>
</div>

@javascript('statuses', \App\Article::STATUSES)
@javascript('categories', $categories)
@endsection