@extends('shared.layout')
@section('title', 'Sunting Data Pengguna')
@section('content')
<div class="container my-5">
    <h1 class='mb-5'>
        <i class='fa fa-pencil'></i>
        Sunting Data Pengguna
    </h1>

    @include('shared.message', ['session_key' => 'message.success', 'state' => 'success'])

    <div class="card w-50">
        <div class="card-header">
            <i class="fa fa-pencil"></i>
            Sunting Data Pengguna
        </div>
        <div class="card-body">
           <form action="{{ route('user.update', $user) }}" method="POST">
               @csrf
               <div class='form-group'>
                   <label for='name'> Nama Asli: </label>
               
                   <input
                       id='name' name='name' type='text'
                       placeholder='Nama Asli'
                       value='{{ old('name', $user->name) }}'
                       class='form-control {{ !$errors->has('name') ?: 'is-invalid' }}'>
               
                   <div class='invalid-feedback'>
                       {{ $errors->first('name') }}
                   </div>
               </div>

               <div class='form-group'>
                   <label for='username'> Nama Pengguna: </label>
               
                   <input
                       id='username' name='username' type='text'
                       placeholder='Nama Pengguna'
                       value='{{ old('username', $user->username) }}'
                       class='form-control {{ !$errors->has('username') ?: 'is-invalid' }}'>
               
                   <div class='invalid-feedback'>
                       {{ $errors->first('username') }}
                   </div>
               </div>

               <div class='form-group'>
                   <label for='type'> Tipe Akun: </label>
                   <select name='type' id='type' class='form-control'>
                       @foreach(\App\User::TYPES as $key => $value)
                       <option {{ old('type', $user->getOriginal('type')) !== $key ?: 'selected' }} value='{{ $key }}'> {{ $value }} </option>
                       @endforeach
                   </select>
                   <div class='invalid-feedback'>
                       {{ $errors->first('type') }}
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

               <div class='form-group'>
                   <label for='password_confirmation'> Kata Sandi (Ulangi): </label>
               
                   <input
                       id='password_confirmation' name='password_confirmation' type='password'
                       placeholder='Kata Sandi (Ulangi)'
                       value='{{ old('password_confirmation') }}'
                       class='form-control {{ !$errors->has('password_confirmation') ?: 'is-invalid' }}'>
               
                   <div class='invalid-feedback'>
                       {{ $errors->first('password_confirmation') }}
                   </div>
               </div>

               <div class="form-group mt-5">
                   <button class="btn btn-primary">
                       <i class="fa fa-check"></i>
                       Ubah Data
                   </button>
               </div>
           </form>
        </div>
    </div>
</div>
@endsection