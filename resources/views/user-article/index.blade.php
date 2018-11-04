@extends('shared.layout')
@section('title', 'Daftar Seluruh Artikel')
@section('content')
<div class="container my-5">
    <h1 class='mb-5'>
        <i class='fa fa-file-text'></i>
        Daftar Seluruh Artikel
    </h1>

    <div class="card">
        <div class="card-header">
            <i class="fa fa-file-text"></i>
            Daftar Seluruh Artikel
        </div>
        <div class="card-body">
            <div class='table-responsive'>
                <table class='table table-sm table-bordered table-striped'>
                   <thead>
                        <tr>
                            <th> #. </th>
                            <th> Judul </th>
                            <th> Penulis </th>
                            <th> Kategori </th>
                            <th> T. Publikasi </th>
                            <th> Tindakan </th>
                        </tr>
                   </thead>
                   <tbody>
                       @foreach ($articles as $article)
                        <tr>
                            <td> {{ $loop->iteration }} </td>
                            <td> {{ $article->title }} </td>
                            <td> {{ $article->poster->name }} </td>
                            <td> {{ $article->category->name }} </td>
                            <td> @localized_date($article->published_date) </td>
                            <td>
                                <a href="{{ route('user-article.read', $article) }}" class="btn btn-secondary btn-sm">
                                    <i class="fa fa-eye"></i>
                                </a>

                                <form action='{{ route('user-article.delete', $article) }}' method='POST' class='d-inline-block'>
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
</div>
@endsection