@extends('shared.layout')
@section('title', 'Seluruh Hasil Penelitian')
@section('content')
<div class="container my-5">
    <h1 class='mb-5'>
        <i class='fa fa-flask'></i>
        Seluruh Hasil Penelitian
    </h1>

    @include('shared.message', ['session_key' => 'message.success', 'state' => 'success'])

    <div class="card">
        <div class="card-header">
            <i class="fa fa-flask"></i>
            Seluruh Hasil Penelitian
        </div>
        <div class="card-body">
            <div class='table-responsive'>
                <table class='table table-sm table-bordered'>
                   <thead>
                        <tr>
                            <th> # </th>
                            <th> Judul </th>
                            <th> Penulis </th>
                            <th> Kategori </th>
                            <th> Tindakan </th>
                        </tr>
                   </thead>
                   <tbody>
                       @foreach ($researches as $research)
                        <tr>
                            <td> {{ $loop->iteration }} </td>
                            <td> {{ $research->title }} </td>
                            <td> {{ $research->poster->name }} </td>
                            <td> {{ $research->category->name }} </td>
                            <td>
                                <a href="{{ route('research.document', $research) }}" class="btn btn-secondary btn-sm">
                                    <i class="fa fa-file-pdf-o"></i>
                                </a>
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