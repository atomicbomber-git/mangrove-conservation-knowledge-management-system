@extends('shared.layout')
@section('title', 'Bibit')
@section('content')
<div class="container my-5">
    <h1 class='mb-5'>
        <i class="fa fa-tree" aria-hidden="true"></i>
        Bibit
    </h1>

    @include('shared.message', ['session_key' => 'message.success', 'state' => 'success'])

    <div class="card">
        <div class="card-header">
            <i class="fa fa-tree"></i>
            Bibit
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class='table-responsive'>
                    <table class='table table-sm table-bordered table-striped'>
                       <thead>
                            <tr>
                                <th> # </th>
                                <th> Spesies </th>
                                <th> Famili </th>
                                <th class="text-center"> Kendali </th>
                            </tr>
                       </thead>
                       <tbody>
                           @foreach ($bibits as $bibit)
                            <tr>
                                <td> {{ $loop->iteration }}. </td>
                                <td> {{ $bibit->spesies ?? '-' }} </td>
                                <td> {{ $bibit->famili ?? '-' }} </td>
                                <td class="text-center">
                                    <form action='{{ route('bibit.delete', $bibit) }}' method='POST' class='d-inline-block'>
                                        @csrf
                                        <button type='submit' class='btn btn-delete btn-danger btn-sm'>
                                            Hapus
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
</div>
@endsection
