@extends('shared.layout')
@section('title', 'Tambah Kategori')
@section('content')
<div class="container my-5">
    <h1 class='mb-5'>
        <i class='fa fa-list'></i>
        Tambah Kategori
    </h1>

    <div class="card w-50">
        <div class="card-header">
            <i class="fa fa-list"></i>
            Tambah Kategori
        </div>
        <div class="card-body">
           <form action="{{ route('category.store') }}" method="POST">
               @csrf
               <div class='form-group'>
                   <label for='name'> Nama: </label>
               
                   <input
                       id='name' name='name' type='text'
                       placeholder='Nama'
                       value='{{ old('name') }}'
                       class='form-control {{ !$errors->has('name') ?: 'is-invalid' }}'>
               
                   <div class='invalid-feedback'>
                       {{ $errors->first('name') }}
                   </div>
               </div>

               <div class="form-group">
                   <button class="btn btn-primary">
                        Tambah Kategori
                        <i class="fa fa-plus"></i>
                   </button>
               </div>
           </form>
        </div>
    </div>
</div>
@endsection