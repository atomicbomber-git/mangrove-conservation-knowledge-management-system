@extends('shared.layout')
@section('title', 'Sunting Artikel')
@section('content')
<div class="container my-5">
    <h1 class='mb-5'>
        <i class='fa fa-pencil'></i>
        Sunting Artikel
    </h1>

    @include('shared.message', ['session_key' => 'message.success', 'state' => 'success'])

    <div class="card">
        <div class="card-header">
            <i class="fa fa-pencil"></i>
            Sunting Artikel
        </div>
        <div class="card-body">

            <div id="app">
                <user-article-edit/>
            </div>
        </div>
    </div>
</div>

@javascript('article', $article)
@javascript('categories', $categories)

@endsection