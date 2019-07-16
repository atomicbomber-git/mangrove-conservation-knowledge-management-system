@extends('shared.layout')
@section('title', 'Bibit')
@section('content')
<div class="container my-5">
    <h1 class='mb-5'>
        <i class='fa fa-circle'></i>
        Bibit
    </h1>

    @include('shared.message', ['session_key' => 'message.success', 'state' => 'success'])

    <div class="card">
        <div class="card-header">
            <i class="fa fa-circle"></i>
            Bibit
        </div>
        <div class="card-body">
            <div class='table-responsive'>
                <table class='table table-sm table-bordered table-striped'>
                   <thead class='thead thead-dark'>
                        <tr>
                            <th> # </th>
                            <th> Nama </th>
                            <th> Tindakan </th>
                        </tr>
                   </thead>
                   <tbody>
                       @foreach ($bibits as $bibit)
                        <tr>
                            <td> {{ $bibit->id }} </td>
                            <td> {{ $bibit->nama }} </td>
                            <td>
                                <a href="{{ route('bibit.edit', $bibit) }}" class="btn btn-secondary btn-sm">
                                    <i class="fa fa-pencil"></i>
                                </a>

                                <form action='{{ route('bibit.delete', $bibit) }}' method='POST' class='d-inline-block btn-delete'>
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
