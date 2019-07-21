@extends('shared.layout')
@section('title', 'Kelola Artikel')
@section('content')
<div class="container my-5">
    <h1 class='mb-5'>
        <i class='fa fa-list'></i>
        Kelola Artikel
    </h1>

    @include('shared.message', ['session_key' => 'message.success', 'state' => 'success'])

    <div class="card">
        <div class="card-header">
            <i class="fa fa-file-text"></i>
            Kelola Artikel
        </div>
        <div class="card-body">
            <div class="table-responsive-lg">
                <table class='table table-sm table-bordered table-striped'>
                    <thead>
                         <tr>
                             <th> # </th>
                             <th> Penerbit </th>
                             <th> Judul </th>
                             <th> Penulis </th>
                             <th> Media Penerbit </th>
                             <th> Tanggal Publikasi </th>
                             <th> Kategori </th>
                             <th class="text-center"> Status </th>
                             <th class="text-center" style="width: 13rem"> Tindakan </th>
                         </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $article)
                         <tr>
                             <td> {{ $loop->iteration }} </td>
                             <td> {{ $article->poster->name }} </td>
                             <td> {{ str_limit($article->title, 30) }} </td>
                             <td> {{ $article->author_name }} </td>
                             <td> {{ $article->publisher_media ?? '-' }} </td>
                             <td> @format_datetime($article->published_date) </td>
                             <td> {{ $article->category->name }} </td>
                             <td class="text-center">
                                 @include("shared.status", ["status" => $article->getOriginal("status")])
                             </td>
                             <td class="text-center">
                                 <a href="{{ route('user-article.read', $article) }}" class="btn btn-secondary btn-sm">
                                     <i class="fa fa-eye"></i>
                                 </a>

                                 <a href="{{ route('article.edit', $article) }}" class="btn btn-secondary btn-sm">
                                     <i class="fa fa-pencil"></i>
                                 </a>

                                 @switch($article->getOriginal('status'))
                                     @case(App\Article::STATUS_UNAPPROVED)

                                         <form method="POST" class="d-inline-block" action="{{ route('article-verification.create', $article) }}">
                                             @csrf
                                             <button class="btn btn-success btn-sm">
                                                 <i class="fa fa-check"></i>
                                             </button>
                                         </form>

                                         <form method="POST" class="d-inline-block" action="{{ route('article-verification.delete', $article) }}">
                                             @csrf
                                             <button class="btn btn-danger btn-sm">
                                                 <i class="fa fa-times"></i>
                                             </button>
                                         </form>

                                         @break
                                     @case(App\Article::STATUS_APPROVED)

                                         <form method="POST" class="d-inline-block" action="{{ route('article-verification.delete', $article) }}">
                                             @csrf
                                             <button class="btn btn-danger btn-sm">
                                                 <i class="fa fa-times"></i>
                                             </button>
                                         </form>

                                         @break
                                     @case(App\Article::STATUS_REJECTED)

                                         <form method="POST" class="d-inline-block" action="{{ route('article-verification.create', $article) }}">
                                             @csrf
                                             <button class="btn btn-success btn-sm">
                                                 <i class="fa fa-check"></i>
                                             </button>
                                         </form>

                                         @break
                                 @endswitch

                                 <form action='{{ route('article.delete', $article) }}' method='POST' class='d-inline-block'>
                                     @csrf
                                     <button type='submit' class='btn btn-danger btn-delete btn-sm'>
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

@section('extra-scripts')
    @include('shared.datatables')
@endsection
