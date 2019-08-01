@extends('shared.layout')
@section('title', 'Tambah Bibit')
@section('content')
<div class="container my-5">
    <h1 class='mb-5'>
        <i class='fa fa-plus'></i>
        Tambah Bibit
    </h1>

    <div class="card">
        <div class="card-header">
            <i class="fa fa-plus"></i>
            Tambah Bibit
        </div>
        <div class="card-body">
            <form method='POST' enctype="multipart/form-data" action='{{ route('bibit.store') }}'>
                @csrf
                <div class='form-group'>
                    <label for='spesies'> Spesies: </label>

                    <input
                        id='spesies' name='spesies' type='text'
                        placeholder='Spesies'
                        value='{{ old('spesies') }}'
                        class='form-control {{ !$errors->has('spesies') ?: 'is-invalid' }}'>

                    <div class='invalid-feedback'>
                        {{ $errors->first('spesies') }}
                    </div>
                </div>

                <div class='form-group'>
                    <label for='image'>
                         Gambar:
                    </label>

                    <input
                        id='image'
                        name='image'
                        type='file'
                        placeholder='Gambar'
                        value='{{ old('image') }}'
                        class='form-control {{ !$errors->has('image') ?: 'is-invalid' }}'>

                    <div class='invalid-feedback'>
                        {{ $errors->first('image') }}
                    </div>
                </div>


                <div class='form-group'>
                    <label for='famili'> Famili: </label>
                    <input
                        id='famili' name='famili' type='text'
                        placeholder='Famili'
                        value='{{ old('famili') }}'
                        class='form-control {{ !$errors->has('famili') ?: 'is-invalid' }}'>

                    <div class='invalid-feedback'>
                        {{ $errors->first('famili') }}
                    </div>
                </div>

                <div class='form-group'>
                    <label for='deskripsi'>
                        Deskripsi:
                    </label>

                    <textarea
                        id='deskripsi'
                        name='deskripsi'
                        placeholder="Deskripsi"
                        class='form-control {{ !$errors->has('deskripsi') ?: 'is-invalid' }}'
                        col='30'
                        row='6'
                        >{{ old('deskripsi') }}</textarea>

                    <div class='invalid-feedback'>
                        {{ $errors->first('deskripsi') }}
                    </div>
                </div>

                <div class='form-group'>
                    <label for='daun'>
                        Daun:
                    </label>

                    <textarea
                        id='daun'
                        name='daun'
                        placeholder='Daun'
                        class='form-control {{ !$errors->has('daun') ?: 'is-invalid' }}'
                        col='30'
                        row='6'
                        >{{ old('daun') }}</textarea>

                    <div class='invalid-feedback'>
                        {{ $errors->first('daun') }}
                    </div>
                </div>

                <div class='form-group'>
                    <label for='bunga'>
                        Bunga:
                    </label>

                    <textarea
                        id='bunga'
                        name='bunga'
                        placeholder='Bunga'
                        class='form-control {{ !$errors->has('bunga') ?: 'is-invalid' }}'
                        col='30'
                        row='6'
                        >{{ old('bunga') }}</textarea>

                    <div class='invalid-feedback'>
                        {{ $errors->first('bunga') }}
                    </div>
                </div>

                <div class='form-group'>
                    <label for='buah'>
                        Buah:
                    </label>

                    <textarea
                        id='buah'
                        name='buah'
                        placeholder='Buah'
                        class='form-control {{ !$errors->has('buah') ?: 'is-invalid' }}'
                        col='30'
                        row='6'
                        >{{ old('buah') }}</textarea>

                    <div class='invalid-feedback'>
                        {{ $errors->first('buah') }}
                    </div>
                </div>

                <div class='form-group'>
                    <label for='ekologi'>
                        Ekologi:
                    </label>

                    <textarea
                        id='ekologi'
                        name='ekologi'
                        placeholder='Ekologi'
                        class='form-control {{ !$errors->has('ekologi') ?: 'is-invalid' }}'
                        col='30'
                        row='6'
                        >{{ old('ekologi') }}</textarea>

                    <div class='invalid-feedback'>
                        {{ $errors->first('ekologi') }}
                    </div>
                </div>

                <div class='form-group'>
                    <label for='Penyebaran'>
                        Penyebaran:
                    </label>

                    <textarea
                        id='Penyebaran'
                        name='Penyebaran'
                        class='form-control {{ !$errors->has('Penyebaran') ?: 'is-invalid' }}'
                        col='30'
                        row='6'
                        placeholder='Penyebaran'
                        >{{ old('Penyebaran') }}</textarea>

                    <div class='invalid-feedback'>
                        {{ $errors->first('Penyebaran') }}
                    </div>
                </div>

                <div class='form-group'>
                    <label for='kelimpahan'>
                        Kelimpahan:
                    </label>

                    <textarea
                        id='kelimpahan'
                        name='kelimpahan'
                        placeholder='Kelimpahan'
                        class='form-control {{ !$errors->has('kelimpahan') ?: 'is-invalid' }}'
                        col='30'
                        row='6'
                        >{{ old('kelimpahan') }}</textarea>

                    <div class='invalid-feedback'>
                        {{ $errors->first('kelimpahan') }}
                    </div>
                </div>

                <div class='form-group'>
                    <label for='manfaat'>
                        Manfaat:
                    </label>

                    <textarea
                        id='manfaat'
                        name='manfaat'
                        placeholder='Manfaat'
                        class='form-control {{ !$errors->has('manfaat') ?: 'is-invalid' }}'
                        col='30'
                        row='6'
                        >{{ old('manfaat') }}</textarea>

                    <div class='invalid-feedback'>
                        {{ $errors->first('manfaat') }}
                    </div>
                </div>

                <div class='form-group'>
                    <label for='catatan'>
                        Catatan:
                    </label>

                    <textarea
                        id='catatan'
                        name='catatan'
                        placeholder='Catatan'
                        class='form-control {{ !$errors->has('catatan') ?: 'is-invalid' }}'
                        col='30'
                        row='6'
                        >{{ old('catatan') }}</textarea>

                    <div class='invalid-feedback'>
                        {{ $errors->first('catatan') }}
                    </div>
                </div>

                <div>
                    <button class="btn btn-primary">
                        Tambah Bibit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
