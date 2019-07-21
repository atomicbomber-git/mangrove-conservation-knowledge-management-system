@extends('shared.layout')
@section('title', 'Kelola Kategori')
@section('content')
<div class="container my-5">
    <h1 class='mb-5'>
        <i class='fa fa-list'></i>
        Kelola Kategori
    </h1>

    {{-- <div class="my-4">
            <a href="{{ route('category.create') }}" class="btn btn-secondary">
            Tambahkan Kategori Baru
            <i class="fa fa-plus"></i>
        </a>
    </div> --}}

    @include('shared.message', ['session_key' => 'message.success', 'state' => 'success'])

    <div class="card">
        <div class="card-header">
            <i class="fa fa-list"></i>
            Kelola Kategori
        </div>
        <div class="card-body">
           <table class='table table-sm table-bordered table-striped'>
              <thead>
                   <tr>
                       <th> # </th>
                       <th> Nama Kategori </th>
                       {{-- <th> Tindakan </th> --}}
                   </tr>
              </thead>
              <tbody>
                  @foreach ($categories as $category)
                   <tr>
                       <td> {{ $loop->iteration }}. </td>
                       <td> {{ $category->name }} </td>
                       {{-- <td>
                            <a href="{{ route('category.edit', $category) }}" class="btn btn-secondary btn-sm">
                                <i class="fa fa-pencil"></i>
                            </a>

                           @if($category->deletable)
                           <form action='{{ route('category.delete', $category) }}' method='POST' class='d-inline-block'>
                                @csrf
                                <button type='submit' class='btn btn-danger btn-delete btn-sm'>
                                    <i class='fa fa-trash'></i>
                                </button>
                            </form>
                           @else
                            <button class="btn btn-danger btn-delete btn-sm" disabled>
                                <i class="fa fa-trash"></i>
                            </button>
                           @endif
                       </td> --}}
                   </tr>
                  @endforeach
              </tbody>
           </table>
        </div>
    </div>
</div>
@endsection

@section('extra-scripts')
    @include('shared.datatables')
@endsection
