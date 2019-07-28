@extends('shared.layout')
@section('title', 'Tambah Program Pemerintah')
@section('content')
<div class="container my-5">
    <h1 class='mb-5'>
        <i class='fa fa-plus'></i>
        Tambah Program Pemerintah
    </h1>

    <div class="card">
        <div class="card-header">
            <i class="fa fa-plus"></i>
            Tambah Program Pemerintah
        </div>
        <div class="card-body" id="app">
            <form method='POST' enctype="multipart/form-data" action='{{ route('program-pemerintah.store') }}'>
                @csrf

                <div class='form-group'>
                    <label for='nama'> Nama: </label>

                    <input
                        id='nama' name='nama' type='text'
                        placeholder='Nama'
                        value='{{ old('nama') }}'
                        class='form-control {{ !$errors->has('nama') ?: 'is-invalid' }}'>

                    <div class='invalid-feedback'>
                        {{ $errors->first('nama') }}
                    </div>
                </div>

                <div class='form-group'>
                    <label for='image'> Gambar: </label>

                    <input
                        id='image'
                        name='image'
                        type='file'
                        accept="img/*"
                        placeholder='Gambar'
                        class='form-control {{ !$errors->has('image') ?: 'is-invalid' }}' style="padding-bottom: 2.2rem">

                    <div class='invalid-feedback'>
                        {{ $errors->first('image') }}
                    </div>
                </div>

                <div class='form-group'>
                    <label for='lokasi'> Lokasi: </label>

                    <input
                        id='lokasi' name='lokasi' type='text'
                        placeholder='Lokasi'
                        value='{{ old('lokasi') }}'
                        class='form-control {{ !$errors->has('lokasi') ?: 'is-invalid' }}'>

                    <div class='invalid-feedback'>
                        {{ $errors->first('lokasi') }}
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md">
                        <div class='form-group'>
                            <label for='tanggal_mulai'> Tanggal Mulai: </label>
                            <input
                                id='tanggal_mulai' name='tanggal_mulai' type='date'
                                placeholder='Tanggal Mulai'
                                value='{{ old('tanggal_mulai') }}'
                                class='form-control {{ !$errors->has('tanggal_mulai') ?: 'is-invalid' }}'>
                            <div class='invalid-feedback'>
                                {{ $errors->first('tanggal_mulai') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for='tanggal_selesai'> Tanggal Selesai: </label>
                            <input
                                id='tanggal_selesai' name='tanggal_selesai' type='date'
                                placeholder='Tanggal Selesai'
                                value='{{ old('tanggal_selesai') }}'
                                class='form-control {{ !$errors->has('tanggal_selesai') ?: 'is-invalid' }}'>
                            <div class='invalid-feedback'>
                                {{ $errors->first('tanggal_selesai') }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class='form-group'>
                    <label for='dana'> Dana: </label>

                    <input
                        id='dana' name='dana' type='number'
                        placeholder='Dana'
                        value='{{ old('dana') }}'
                        class='form-control {{ !$errors->has('dana') ?: 'is-invalid' }}'>

                    <div class='invalid-feedback'>
                        {{ $errors->first('dana') }}
                    </div>
                </div>

                <div class='form-group'>
                    <label for='penanggung_jawab'> Penanggung Jawab: </label>

                    <input
                        id='penanggung_jawab' name='penanggung_jawab' type='text'
                        placeholder='Penanggung Jawab'
                        value='{{ old('penanggung_jawab') }}'
                        class='form-control {{ !$errors->has('penanggung_jawab') ?: 'is-invalid' }}'>

                    <div class='invalid-feedback'>
                        {{ $errors->first('penanggung_jawab') }}
                    </div>
                </div>

                <div class='form-group'>
                    <label for='nama_instansi'> Nama Instansi: </label>

                    <input
                        id='nama_instansi' name='nama_instansi' type='text'
                        placeholder='Nama Instansi'
                        value='{{ old('nama_instansi') }}'
                        class='form-control {{ !$errors->has('nama_instansi') ?: 'is-invalid' }}'>

                    <div class='invalid-feedback'>
                        {{ $errors->first('nama_instansi') }}
                    </div>
                </div>

                <div class='form-group'>
                    <label for='nama_instansi_penerima'> Nama Instansi Penerima: </label>

                    <input
                        id='nama_instansi_penerima' name='nama_instansi_penerima' type='text'
                        placeholder='Nama Instansi Penerima'
                        value='{{ old('nama_instansi_penerima') }}'
                        class='form-control {{ !$errors->has('nama_instansi_penerima') ?: 'is-invalid' }}'>

                    <div class='invalid-feedback'>
                        {{ $errors->first('nama_instansi_penerima') }}
                    </div>
                </div>

                <div class='form-group'>
                    <label for='penanggung_jawab_penerima'> Penanggung Jawab Penerima: </label>

                    <input
                        id='penanggung_jawab_penerima' name='penanggung_jawab_penerima' type='text'
                        placeholder='Penanggung Jawab Penerima'
                        value='{{ old('penanggung_jawab_penerima') }}'
                        class='form-control {{ !$errors->has('penanggung_jawab_penerima') ?: 'is-invalid' }}'>

                    <div class='invalid-feedback'>
                        {{ $errors->first('penanggung_jawab_penerima') }}
                    </div>
                </div>

                <div class='form-group'>
                    <label for='bentuk'> Bentuk: </label>

                    <textarea
                        id='bentuk' name='bentuk'
                        class='form-control {{ !$errors->has('bentuk') ?: 'is-invalid' }}'
                        col='30' row='6'
                        >{{ old('bentuk') }}</textarea>

                    <div class='invalid-feedback'>
                        {{ $errors->first('bentuk') }}
                    </div>
                </div>

                <div class='form-group'>
                    <label for='persentase_hasil'> Persentase Hasil (%): </label>

                    <input
                        id='persentase_hasil' name='persentase_hasil' type='number'
                        placeholder='Persentase Hasil (%)'
                        step="0.01"
                        value='{{ old('persentase_hasil') }}'
                        class='form-control {{ !$errors->has('persentase_hasil') ?: 'is-invalid' }}'>

                    <div class='invalid-feedback'>
                        {{ $errors->first('persentase_hasil') }}
                    </div>
                </div>

                <div class='form-group'>
                    <label for='hasil'> Hasil: </label>

                    <textarea
                        id='hasil' name='hasil'
                        class='form-control {{ !$errors->has('hasil') ?: 'is-invalid' }}'
                        col='30' row='6'
                        >{{ old('hasil') }}</textarea>

                    <div class='invalid-feedback'>
                        {{ $errors->first('hasil') }}
                    </div>
                </div>

                <div>
                    <input id="submit" type="submit" value="Tambah Program Pemerintah" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
