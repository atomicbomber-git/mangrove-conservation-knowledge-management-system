@extends('shared.layout')
@section('title', "Artikel dalam Kategori '{{ $category->name }}'")
@section('content')
<div class="container my-5">

    <div class="mb-4">
        <a class="btn btn-default btn-sm" href="{{ route('user-article.index') }}">
            <i class="fa fa-arrow-left"></i>
            Kembali ke Daftar Kategori Artikel
        </a>
    </div>

    <h1>
        <i class='fa fa-icon'></i>
        Artikel dalam Kategori '{{ $category->name }}'
    </h1>
    <hr class="mt-0 mb-5">

    <div class="card">
        <div class="card-body">
            @foreach($articles as $article)
            <div class="mb-4">
                <a href="{{ route('user-article.read', $article) }}" class="d-block text-muted"> {{ $article->title }} </a>
                <small> @localized_date($article->published_date) oleh <span class="font-weight-bold"> {{ $article->poster->name }} </span> </small>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection