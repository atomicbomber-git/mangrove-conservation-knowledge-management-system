@extends('shared.layout')
@section('title', 'Seluruh Hasil Penelitian')
@section('content')
<div class="container my-5">
    <h1 class='mb-5'>
        <i class='fa fa-flask'></i>
        Seluruh Hasil Penelitian
    </h1>

    <div class="my-4">
        <a href="{{ route('research.create') }}" class="btn btn-secondary">
            Tambahkan Hasil Penelitian Baru
            <i class="fa fa-plus"></i>
        </a>
    </div>

    @include('shared.message', ['session_key' => 'message.success', 'state' => 'success'])

    <div class="card">
        <div class="card-header">
            <i class="fa fa-flask"></i>
            Seluruh Hasil Penelitian
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class='table table-sm table-bordered table-striped'>
                    <thead>
                        <tr>
                            <th> # </th>
                            <th> Judul </th>
                            <th> Penulis </th>
                            <th> Kategori </th>
                            <th> Tahun </th>
                            <th> Status </th>
                            <th> Tindakan </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($researches as $research)
                            <tr>
                                <td> {{ $loop->iteration }} </td>
                                <td style="width: 15rem"> {{ $research->title }} </td>
                                <td style="width: 15rem"> {{ join(", ", $research->authors->pluck("name")->toArray()) }} </td>
                                <td> {{ $research->category->name }} </td>
                                <td> {{ $research->year }} </td>
                                <td>
                                    @switch($research->getOriginal('status'))
                                    @case('approved')
                                    <span class="badge badge-pill badge-success">
                                        {{ $research->status }}
                                    </span>
                                    @break
                                    @case('unapproved')
                                    <span class="badge badge-pill badge-danger">
                                        {{ $research->status }}
                                    </span>
                                    @break
                                    @endswitch
                                </td>
                                <td>
                                    <a href="{{ route('research.edit', $research) }}" class="btn btn-secondary btn-sm">
                                        <i class="fa fa-pencil"></i>
                                    </a>

                                    <a href="{{ route('research.detail', $research) }}" class="btn btn-secondary btn-sm">
                                        <i class="fa fa-list"></i>
                                    </a>

                                    @if($research->getOriginal('status') == App\Research::STATUS_UNAPPROVED)

                                    <form method="POST" class="d-inline-block" action="{{ route('research-verification.create', $research) }}">
                                        @csrf
                                        <button class="btn btn-success btn-sm">
                                            <i class="fa fa-check"></i>
                                        </button>
                                    </form>

                                    @else

                                    <form method="POST" class="d-inline-block" action="{{ route('research-verification.delete', $research) }}">
                                        @csrf
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </form>

                                    @endif

                                    <form action='{{ route('research.delete', $research) }}' method='POST' class='ml-3 d-inline-block'>
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