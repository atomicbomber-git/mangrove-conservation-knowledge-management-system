@extends('shared.layout')
@section('title', $article->title)
@section('content')
<div class="container my-5">
    <div class="mb-4">
        <a class="btn btn-default btn-sm" href="{{ route('user-article.filtered-index', ['category_id' => $article->category->id]) }}">
            <i class="fa fa-arrow-left"></i>
            Kembali ke Daftar Artikel
        </a>
    </div>
    
    <div class="card mb-5">
        <div class="card-body">
            <small>
                @localized_date($article->published_date) <br>
                ({{ $article->publisher_media ?? '-' }})
            </small>
    
            <h1> {{ $article->title }}
                <small class="text-muted">
                    <p class="lead">
                        Oleh {{ $article->author_name }}
                    </p>
                </small>
            </h1>
            <p class="lead">
                <span class="badge badge-info"> {{ $article->category->name }} </span>
            </p>

            <div id="content">
                {!! $article->content !!}
            </div>
        </div>
    </div>
</div>
@endsection

@section ('extra-scripts')
<script>

tinyMCE.init(Object.assign(window.tinymce_settings, {
    content_css: '{{ asset('css/app.css') }}',
    inline: true,
    readonly: true,
}))

</script>
@endsection