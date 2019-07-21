@extends('shared.layout')
@section('title', 'Seluruh Pengguna')
@section('content')
<div class="container my-5">
    <h1 class='mb-5'>
        <i class='fa fa-users'></i>
        Seluruh Pengguna
    </h1>

    @include('shared.message', ['session_key' => 'message.success', 'state' => 'success'])

    <div class="my-4">
        <a href="{{ route('user.create') }}" class="btn btn-secondary">
            Tambahkan Akun Baru
            <i class="fa fa-plus"></i>
        </a>
    </div>

    <div class="card">
        <div class="card-header">
            <i class="fa fa-users"></i>
            Seluruh Pengguna
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class='table table-sm table-striped table-bordered'>
                    <thead>
                        <tr>
                            <th> # </th>
                            <th> Nama Asli </th>
                            <th> Nama Pengguna </th>
                            <th> Status </th>
                            <th> Tindakan </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td> {{ $loop->iteration }} </td>
                            <td> {{ $user->name }} </td>
                            <td> {{ $user->username }} </td>
                            <td> {{ $user->type }} </td>
                            <td>

                                <a href="{{ route('user.edit', $user) }}" class="btn btn-secondary btn-sm">
                                    <i class="fa fa-pencil"></i>
                                </a>

                                <form action='{{ route('user.delete', $user) }}' method='POST' class='d-inline-block'>
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
