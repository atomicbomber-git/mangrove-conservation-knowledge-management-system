@extends('shared.layout')
@section('title', 'Kelola Hasil Penelitian Saya')
@section('content')
<div class="container my-5">
    <h1 class='mb-5'>
        <i class='fa fa-flask'></i>
        Kelola Hasil Penelitian Saya
    </h1>

    @include('shared.message', ['session_key' => 'message.success', 'state' => 'success'])

    <div class="card">
        <div class="card-header">
            <i class="fa fa-flask"></i>
            Kelola Hasil Penelitian Saya
        </div>
        <div class="card-body">
            <div class='table-responsive'>
                <table class='table table-sm table-bordered'>
                   <thead>
                        <tr>
                            <th> # </th>
                            <th> Judul </th>
                            <th> Kategori </th>
                            <th> Status </th>
                            <th class="text-center"> Tindakan </th>
                        </tr>
                   </thead>
                   <tbody>
                       @foreach ($researches as $research)
                        <tr>
                            <td> {{ $loop->iteration }} </td>
                            <td> {{ $research->title }} </td>
                            <td> {{ $research->category->name }} </td>
                            <td>
                                @include("shared.research-status", ["article" => $research])
                            </td>
                            <td class="text-center">
                                <a href="{{ route('user-research.edit', $research) }}" class="btn btn-secondary btn-sm">
                                    <i class="fa fa-pencil"></i>
                                </a>

                                <a href="{{ route('user-research.detail', $research) }}" class="btn btn-secondary btn-sm">
                                    <i class="fa fa-list"></i>
                                </a>

                                @can("delete", $research)
                                <form action='{{ route('user-research.delete', $research) }}' method='POST' class='d-inline-block'>
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
