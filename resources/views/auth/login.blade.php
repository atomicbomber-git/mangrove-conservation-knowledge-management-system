@extends('shared.layout')
@section('title', 'Halaman Masuk')
@section('content')

<div style="height: 90vh; background-image: url('images/mangrove.jpg'); background-size:cover">
    <div class="container pt-5">
        <div class="card mx-auto" style="max-width: 30rem">
            <div class="card-header">
                <i class="fa fa-sign-in"></i>
                Masuk
            </div>
            <div class="card-body">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class='form-group'>
                        <label for='username'> Nama Pengguna: </label>
                    
                        <input
                            id='username' name='username' type='text'
                            placeholder='Nama Pengguna'
                            value='{{ old('username') }}'
                            class='form-control {{ !$errors->has('username') ?: 'is-invalid' }}'>
                    
                        <div class='invalid-feedback'>
                            {{ $errors->first('username') }}
                        </div>
                    </div>
    
                    <div class='form-group'>
                        <label for='password'> Kata Sandi: </label>
                    
                        <input
                            id='password' name='password' type='password'
                            placeholder='Kata Sandi'
                            value='{{ old('password') }}'
                            class='form-control {{ !$errors->has('password') ?: 'is-invalid' }}'>
                    
                        <div class='invalid-feedback'>
                            {{ $errors->first('password') }}
                        </div>
                    </div>
    
                    <div class="mt-5">
                        <a href="{{ route('register') }}" class="mr-2">
                            Registrasi Akun
                        </a>
    
                        <button class="btn btn-primary">
                            Masuk
                            <i class="fa fa-sign-in"></i>
                        </button>
                    </div>
    
                </form>
            </div>
        </div>
    </div>
</div>

@endsection