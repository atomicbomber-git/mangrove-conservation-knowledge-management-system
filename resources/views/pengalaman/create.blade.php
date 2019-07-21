@extends('shared.layout')
@section('title', 'Tambah Pengalaman ')
@section('content')
<div class="container my-5">
    <h1 class='mb-5'>
        <i class='fa fa-plus'></i>
        Tambah Pengalaman
    </h1>

    <div class="card">
        <div class="card-header">
            <i class="fa fa-plus"></i>
            Tambah Pengalaman
        </div>
        <div class="card-body">

            <form method='POST' action='{{ route('pengalaman.store') }}' class="form-create">
                @csrf

                <div class='form-group'>
                        <label for='tema'> Tema: </label>

                        <input
                            id='tema' name='tema' type='text'
                            placeholder='Tema'
                            value='{{ old('tema') }}'
                            class='form-control {{ !$errors->has('tema') ?: 'is-invalid' }}'>

                        <div class='invalid-feedback'>
                            {{ $errors->first('tema') }}
                        </div>
                    </div>

                    <div class='form-group'>
                        <label for='cerita'> Cerita: </label>

                        <textarea
                            placeholder="Cerita`"
                            id='cerita' name='cerita'
                            class='form-control {{ !$errors->has('cerita') ?: 'is-invalid' }}'
                            col='30' row='6'
                            >{{ old('cerita') }}</textarea>

                        <div class='invalid-feedback'>
                            {{ $errors->first('cerita') }}
                        </div>
                    </div>

                    <div class='form-group'>
                        <label for='pengaduan'> Pengaduan: </label>

                        <textarea
                            placeholder="Pengaduan"
                            id='pengaduan' name='pengaduan'
                            class='form-control {{ !$errors->has('pengaduan') ?: 'is-invalid' }}'
                            col='30' row='6'
                            >{{ old('pengaduan') }}</textarea>

                        <div class='invalid-feedback'>
                            {{ $errors->first('pengaduan') }}
                        </div>
                    </div>

                    <div class='form-group'>
                        <label for='keluhan'> Keluhan: </label>

                        <textarea
                            placeholder="Keluhan"
                            id='keluhan' name='keluhan'
                            class='form-control {{ !$errors->has('keluhan') ?: 'is-invalid' }}'
                            col='30' row='6'
                            >{{ old('keluhan') }}</textarea>

                        <div class='invalid-feedback'>
                            {{ $errors->first('keluhan') }}
                        </div>
                    </div>

                    <div class='form-group'>
                        <label for='saran'> Saran: </label>

                        <textarea
                            placeholder="Saran"
                            id='saran' name='saran'
                            class='form-control {{ !$errors->has('saran') ?: 'is-invalid' }}'
                            col='30' row='6'
                            >{{ old('saran') }}</textarea>

                        <div class='invalid-feedback'>
                            {{ $errors->first('saran') }}
                        </div>
                    </div>

                    <div>
                        <input id="submit" type="submit" value="Tambah Pengalaman" class="btn btn-primary">
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection
