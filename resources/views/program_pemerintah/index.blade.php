@extends('shared.layout')
@section('title', 'Program Pemerintah')
@section('content')
<div class="container my-5">
    <h1 class='mb-5'>
        <i class='fa fa-product-hunt'></i>
        Program Pemerintah
    </h1>

    @include('shared.message', ['session_key' => 'message.success', 'state' => 'success'])

    <div class="card">
        <div class="card-header">
            <i class="fa fa-product-hunt"></i>
            Program Pemerintah
        </div>
        <div class="card-body">
            <div class='table-responsive'>
                <table class='table table-sm table-bordered table-striped'>
                   <thead class='thead thead-dark'>
                        <tr>
                            <th> # </th>
                            <th style="width: 10rem"> Nama </th>
                            <th class="text-right"> Dana (Rp.) </th>
                            <th> Durasi </th>
                            <th> Penanggung Jawab </th>
                            <th> Tindakan </th>
                        </tr>
                   </thead>
                   <tbody>
                        @inject('formatter', 'App\Helpers\FormatterInterface')
                        @foreach ($programPemerintahs as $programPemerintah)
                         <tr>
                             <td> {{ $programPemerintah->id }} </td>
                             <td> {{ $programPemerintah->nama }} </td>
                             <td class="text-right"> {{ $formatter->currency($programPemerintah->dana) }} </td>
                             <td>
                                 {{ $formatter->date($programPemerintah->tanggal_mulai) }} -
                                 {{ $formatter->date($programPemerintah->tanggal_selesai) }}
                             </td>
                             <td> {{ $programPemerintah->penanggung_jawab }} </td>
                             <td class="text-center">
                                 <a href="{{ route("program-pemerintah.show", $programPemerintah) }}" class="btn btn-sm btn-secondary">
                                    <i class="fa fa-eye"></i>
                                 </a>

                                 <a href="{{ route('program-pemerintah.edit', $programPemerintah) }}" class="btn btn-secondary btn-sm">
                                    <i class="fa fa-pencil"></i>
                                 </a>

                                 <form action='{{ route("program-pemerintah.delete", $programPemerintah) }}' method='POST' class='d-inline-block'>
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

