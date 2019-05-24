@extends('shared.layout')
@section('title', 'Artikel')
@section('content')
<div class="container my-5">
    <h1 class='mb-5'>
        <i class='fa fa-file-text'></i>
        Artikel
    </h1>

    <div class="card">
        <div class="card-body">

            @foreach ($categories->chunk(2) as $category_chunk)

            <div class="row mb-5">
            @foreach ($category_chunk as $category)
                <div class="col">
                    <h4 class="text-primary"> {{ $category->name }} </h4>
                    <hr class="mt-0 mb-2">

                    @foreach ($category->articles as $article)
                    <div class="mb-2">
                        <a href="{{ route('user-article.read', $article) }}" class="d-block text-muted"> {{ $article->title }} </a>
                        <small> @localized_date($article->published_date) oleh <span class="font-weight-bold"> {{ $article->author_name }} </span> </small>
                    </div>
                    @endforeach

                    <a href="{{ route('user-article.filtered-index', ['category_id' => $category->id]) }}" class="text-info font-weight-bold">
                        SELURUH ARTIKEL
                    </a>
                </div>
            @endforeach
            </div>

            @endforeach
        </div>
    </div>
</div>
@endsection