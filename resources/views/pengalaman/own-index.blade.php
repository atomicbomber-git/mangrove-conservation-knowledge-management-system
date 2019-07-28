@extends('shared.layout')
@section('title', 'Kelola Pengalaman Saya')
@section('content')
<div class="container my-5">
    <h1 class='mb-5'>
        <i class='fa fa-address-book'></i>
        Kelola Pengalaman Saya
    </h1>

    @include('shared.message', ['session_key' => 'message.success', 'state' => 'success'])

    <div class="card">
        <div class="card-header">
            <i class="fa fa-address-book"></i>
            Kelola Pengalaman Saya
        </div>
        <div class="card-body">
            <div class='table-responsive'>
                <table class='table table-sm table-bordered table-striped'>
                   <thead>
                        <tr>
                            <th> # </th>
                            <th> Judul </th>
                            <th> Tema </th>
                            <th> Cerita </th>
                            <th class="text-center" style="width: 8rem"> Kendali </th>
                        </tr>
                   </thead>
                   <tbody>
                       @foreach ($pengalamans as $pengalaman)
                        <tr>
                            <td> {{ $loop->iteration }}. </td>
                            <td> {{ $pengalaman->judul }} </td>
                            <td> {{ $pengalaman->tema }} </td>
                            <td> {{ $pengalaman->cerita }} </td>
                            <td class="text-center">
                                <a href="{{ route('pengalaman.edit', $pengalaman) }}" class="btn btn-secondary btn-sm">
                                    <i class="fa fa-pencil"></i>
                                </a>

                                <form action='{{ route('pengalaman.delete', $pengalaman) }}' method='POST' class='d-inline-block'>
                                    @csrf
                                    <button type='submit' class='btn btn-danger btn-sm btn-delete'>
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
