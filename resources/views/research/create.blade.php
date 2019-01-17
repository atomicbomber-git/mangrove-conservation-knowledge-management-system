@extends('shared.layout')
@section('title', 'Tambah Hasil Penelitian')
@section('content')
<div class="container my-5">
    <h1 class='mb-5'>
        <i class='fa fa-plus'></i>
        Tambah Hasil Penelitian
    </h1>

    <div class="card" style="max-width: 40rem">
        <div class="card-header">
            <i class="fa fa-plus"></i>
            Tambah Hasil Penelitian
        </div>
        <div class="card-body">
            <form action="{{ route('research.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class='form-group'>
                    <label for='title'> Judul: </label>
                
                    <input
                        id='title' name='title' type='text'
                        placeholder='Judul'
                        value='{{ old('title') }}'
                        class='form-control {{ !$errors->has('title') ?: 'is-invalid' }}'>

                    <div class='invalid-feedback'>
                        {{ $errors->first('title') }}
                    </div>
                </div>

                <div class='form-group'>
                    <label for='year'> Tahun: </label>
                
                    <input
                        id='year' name='year' type='number'
                        placeholder='Tahun'
                        value='{{ old('year', now()->format('Y')) }}'
                        class='form-control {{ !$errors->has('year') ?: 'is-invalid' }}'>
                
                    <div class='invalid-feedback'>
                        {{ $errors->first('year') }}
                    </div>
                </div>

                <div class='form-group'>
                    <label for='category_id'> Kategori: </label>
                    <select name='category_id' id='category_id' class='form-control'>
                        @foreach($categories as $category)
                        <option {{ old('category_id') !== $category->id ?: 'selected' }} value='{{ $category->id }}'> {{ $category->name }} </option>
                        @endforeach
                    </select>
                    <div class='invalid-feedback'>
                        {{ $errors->first('category_id') }}
                    </div>
                </div>

                <div class="form-group">
                    <label for="document"> Dokumen: </label>
                    <input class='d-block {{ !$errors->has('document') ?: 'is-invalid' }}' type="file" name="document">
                    <div class="text-danger mt-2">
                        {{ $errors->first('document') }}
                    </div>
                </div>

                <div class='form-group'>
                    <label for='description'> Deskripsi: </label>
                
                    <textarea
                        id='description' name='description'
                        placeholder="Deskripsi hasil penelitian"
                        class='form-control {{ !$errors->has('description') ?: 'is-invalid' }}'
                        col='30' row='6'
                        >{{ old('description') }}</textarea>
                
                    <div class='invalid-feedback'>
                        {{ $errors->first('description') }}
                    </div>
                </div>

                <div class="form-group">
                    <button class="btn btn-primary">
                        Tambah Hasil Penelitian
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection