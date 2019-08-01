@extends('shared.layout')
@section('title', 'Definisi')
@section('content')
<div class="container my-5">
    <h1 class='mb-5'>
        <i class='fa fa-book'></i>
        Definisi
    </h1>

    @include('shared.message', ['session_key' => 'message.success', 'state' => 'success'])

    <div class="card">
        <div class="card-header">
            <i class="fa fa-book"></i>
            Definisi
        </div>
        <div class="card-body">
            <div class='table-responsive'>
                <table class='table table-sm table-bordered table-striped'>
                   <thead>
                        <tr>
                            <th> # </th>
                            <th> Judul </th>
                            <th class="text-center"> Kendali </th>
                        </tr>
                   </thead>
                   <tbody>
                        @foreach ($definisis as $definisi)
                         <tr>
                             <td> {{ $loop->iteration }}. </td>
                             <td> {{ $definisi->title }} </td>
                             <td class="text-center">
                                <a
                                    class="btn btn-secondary btn-sm"
                                    href="{{ route('definisi.show', $definisi) }}">
                                    <i class="fa fa-eye"></i>
                                </a>

                                <a
                                    class="btn btn-secondary btn-sm"
                                    href="{{ route('definisi.edit', $definisi) }}">
                                    <i class="fa fa-pencil"></i>
                                </a>

                                <form action='{{ route('definisi.delete', $definisi) }}' method='POST' class='d-inline-block'>
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

