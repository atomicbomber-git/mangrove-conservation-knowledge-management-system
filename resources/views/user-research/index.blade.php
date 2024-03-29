@extends('shared.layout')
@section('title', 'Kelola Hasil Penelitian')
@section('content')
<div class="container my-5">
    <h1 class='mb-5'>
        <i class='fa fa-flask'></i>
        Kelola Hasil Penelitian
    </h1>

    @include('shared.message', ['session_key' => 'message.success', 'state' => 'success'])

    <div class="card">
        <div class="card-header">
            <i class="fa fa-flask"></i>
            Kelola Hasil Penelitian
        </div>
        <div class="card-body">
            <div class='table-responsive'>
                <table class='table table-sm table-bordered'>
                   <thead>
                        <tr>
                            <th> # </th>
                            <th> Nama Penerbit </th>
                            <th> Judul </th>
                            <th> Penulis </th>
                            <th> Kategori </th>
                            <th> Tahun </th>
                            <th class="text-center"> Tindakan </th>
                        </tr>
                   </thead>
                   <tbody>
                       @foreach ($researches as $research)
                        <tr>
                            <td> {{ $loop->iteration }} </td>
                            <td> {{ $research->poster->name }} </td>
                            <td> {{ $research->title }} </td>
                            <td> {{ $research->formatted_authors }} </td>
                            <td> {{ $research->category->name }} </td>
                            <td> {{ $research->year }} </td>
                            <td class="text-center">
                                <a href="{{ route('user-research.detail', $research) }}" class="btn btn-secondary btn-sm">
                                    <i class="fa fa-list"></i>
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

@section('extra-scripts')
    @include('shared.datatables')
@endsection
