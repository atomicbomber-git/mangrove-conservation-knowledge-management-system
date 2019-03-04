@extends('shared.layout')
@section('title', 'Seluruh Artikel')
@section('content')
<div class="container my-5">
    <h1 class='mb-5'>
        <i class='fa fa-list'></i>
        Seluruh Artikel
    </h1>

    <div class="my-4">
        <a href="{{ route('article.create') }}" class="btn btn-secondary">
            Tambahkan Artikel Baru
            <i class="fa fa-plus"></i>
        </a>
    </div>

    @include('shared.message', ['session_key' => 'message.success', 'state' => 'success'])

    <div class="card">
        <div class="card-header">
            <i class="fa fa-file-text"></i>
            Seluruh Artikel
        </div>
        <div class="card-body">
            <table class='table table-sm table-bordered table-striped'>
               <thead>
                    <tr>
                        <th> # </th>
                        <th> Judul </th>
                        <th> Penulis </th>
                        <th> T. Publikasi </th>
                        <th> Kategori </th>
                        <th> Status </th>
                        <th> Tindakan </th>
                    </tr>
               </thead>
               <tbody>
                   @foreach ($articles as $article)
                    <tr>
                        <td> {{ $loop->iteration }} </td>
                        <td> {{ str_limit($article->title, 30) }} </td>
                        <td> {{ $article->poster->name }} </td>
                        <td> @format_datetime($article->published_date) </td>
                        <td> {{ $article->category->name }} </td>
                        <td>
                            @switch($article->getOriginal('status'))
                            @case('approved')
                            <span class="badge badge-pill badge-success">
                                {{ $article->status }}
                            </span>
                            @break
                            @case('unapproved')
                            <span class="badge badge-pill badge-danger">
                                {{ $article->status }}
                            </span>
                            @break
                            @endswitch
                        </td>
                        <td>
                            <a href="{{ route('user-article.read', $article) }}" class="btn btn-secondary btn-sm">
                                <i class="fa fa-eye"></i>
                            </a>

                            <a href="{{ route('article.edit', $article) }}" class="btn btn-secondary btn-sm">
                                <i class="fa fa-pencil"></i>
                            </a>

                            @if($article->getOriginal('status') == App\Article::STATUS_UNAPPROVED)

                            <form method="POST" class="d-inline-block" action="{{ route('article-verification.create', $article) }}">
                                @csrf
                                <button class="btn btn-success btn-sm">
                                    <i class="fa fa-check"></i>
                                </button>
                            </form>

                            @else

                            <form method="POST" class="d-inline-block" action="{{ route('article-verification.delete', $article) }}">
                                @csrf
                                <button class="btn btn-danger btn-sm">
                                    <i class="fa fa-times"></i>
                                </button>
                            </form>

                            @endif

                            <form action='{{ route('article.delete', $article) }}' method='POST' class='ml-3 d-inline-block'>
                                @csrf
                                <button type='submit' class='btn btn-danger btn-sm'>
                                    <i class='fa fa-trash'></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                   @endforeach
               </tbody>
            </table>
        </div>
    </div>
</div>
@endsection