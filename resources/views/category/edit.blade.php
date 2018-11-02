@extends('shared.layout')
@section('title', 'Sunting Kategori')
@section('content')
<div class="container my-5">
    <h1 class='mb-5'>
        <i class='fa fa-list'></i>
        Sunting Kategori
    </h1>

    @include('shared.message', ['session_key' => 'message.success', 'state' => 'success'])

    <div class="card w-50">
        <div class="card-header">
            <i class="fa fa-list"></i>
            Sunting Kategori
        </div>
        <div class="card-body">
           <form action="{{ route('category.update', $category) }}" method="POST">
               @csrf
               <div class='form-group'>
                   <label for='name'> Nama: </label>
               
                   <input
                       id='name' name='name' type='text'
                       placeholder='Nama'
                       value='{{ old('name', $category->name) }}'
                       class='form-control {{ !$errors->has('name') ?: 'is-invalid' }}'>
               
                   <div class='invalid-feedback'>
                       {{ $errors->first('name') }}
                   </div>
               </div>

               <div class="form-group">
                   <button class="btn btn-primary">
                        Ubah Kategori
                        <i class="fa fa-check"></i>
                   </button>
               </div>
           </form>
        </div>
    </div>
</div>
@endsection