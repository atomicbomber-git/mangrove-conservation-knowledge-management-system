@extends('shared.layout')
@section('title', 'Daftar Kelola Artikel')
@section('content')
<div class="container my-5">
    <h1 class='mb-5'>
        <i class='fa fa-file-text'></i>
        Daftar Kelola Artikel Saya
    </h1>

    @include('shared.message', ['session_key' => 'message.success', 'state' => 'success'])

    <div class="card">
        <div class="card-header">
            <i class="fa fa-file-text"></i>
            Daftar Kelola Artikel Saya
        </div>
        <div class="card-body">
            <div class='table-responsive'>
                <table class='table table-sm table-bordered table-striped'>
                   <thead>
                        <tr>
                            <th> #. </th>
                            <th> Penerbit </th>
                            <th> Judul </th>
                            <th> Penulis </th>
                            <th> Media Penerbit </th>
                            <th> Kategori </th>
                            <th> Status </th>
                            <th> Tanggal Publikasi </th>
                            <th class="text-center"> Tindakan </th>
                        </tr>
                   </thead>
                   <tbody>
                       @foreach ($articles as $article)
                        <tr>
                            <td> {{ $loop->iteration }} </td>
                            <td> {{ $article->poster->name }} </td>
                            <td> {{ $article->title }} </td>
                            <td> {{ $article->author_name }} </td>
                            <td> {{ $article->publisher_media ?? '-' }} </td>
                            <td> {{ $article->category->name }} </td>
                            <td>
                                @include("shared.status", ["status" => $article->getOriginal("status")])
                            </td>
                            <td> @localized_date($article->published_date) </td>
                            <td class="text-center">
                                <a href="{{ route('user-article.read', $article) }}" class="btn btn-secondary btn-sm">
                                    <i class="fa fa-eye"></i>
                                </a>

                                <a href="{{ route('user-article.edit', $article) }}" class="btn btn-secondary btn-sm">
                                    <i class="fa fa-pencil"></i>
                                </a>

                                @can('delete-article', $article)
                                <form action='{{ route('user-article.delete', $article) }}' method='POST' class='d-inline-block'>
                                    @csrf
                                    <button type='submit' class='btn btn-danger btn-delete btn-sm'>
                                        <i class='fa fa-trash'></i>
                                    </button>
                                </form>
                                @endcan
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

@section('extra-scripts')
    @include('shared.datatables')
@endsection
