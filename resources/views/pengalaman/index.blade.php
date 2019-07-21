@extends('shared.layout')
@section('title', 'Pengalaman')
@section('content')
<div class="container my-5">
    <h1 class='mb-5'>
        <i class='fa fa-address-book'></i>
        Kelola Pengalaman
    </h1>

    @include('shared.message', ['session_key' => 'message.success', 'state' => 'success'])

    <div class="card">
        <div class="card-body">
            @inject('formatter', 'App\Helpers\FormatterInterface')

            <div class='table-responsive'>
                <table class='table table-sm table-bordered table-striped'>
                   <thead>
                        <tr>
                            <th> # </th>
                            <th> Tema </th>
                            <th> Cerita </th>
                            <th style="width: 12rem"> Tanggal / Waktu </th>
                            <th style="width: 8rem" class="text-center"> Kendali </th>
                        </tr>
                   </thead>
                   <tbody>
                       @foreach ($pengalamans as $pengalaman)
                        <tr>
                            <td> {{ $loop->iteration }}. </td>
                            <td> {{ $pengalaman->tema }} </td>
                            <td> {{ $pengalaman->cerita }} </td>
                            <td> {{ $formatter->localizedDatetime($pengalaman->created_at) }} </td>
                            <td class="text-center">
                                <a href="{{ route('pengalaman.detail', $pengalaman) }}" class="btn btn-secondary btn-sm">
                                    <i class="fa fa-eye"></i>
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
