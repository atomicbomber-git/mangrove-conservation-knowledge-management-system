@extends('shared.layout')
@section('title', $article->title)
@section('content')
<div class="container my-5">
    <div class="mb-5">

        <small>
            @localized_date($article->published_date)
        </small>

        <h1> {{ $article->title }}
            <small class="text-muted">
                <p class="lead">
                    Oleh {{ $article->poster->name }}
                </p>
            </small>
        </h1>
        <p class="lead">
            <span class="badge badge-info"> {{ $article->category->name }} </span>
        </p>
    </div>

    <div>
        {!! $article->content !!}
    </div>
</div>
@endsection