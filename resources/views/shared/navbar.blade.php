<nav class="navbar navbar-dark bg-dark navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#"> {{ @config('app.name') }} </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">

                <li class='nav-item dropdown {{ Route::is('user.*') ? 'active' : '' }}'>
                    <a
                        class='nav-link dropdown-toggle' href='#' id='user' role='button'
                        data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        <i class='fa fa-users'></i>
                        Akun Pengguna
                    </a>
                    
                    <div class='dropdown-menu' aria-labelledby='user'>
                        <a class='dropdown-item' href='{{ route('user.index') }}'> Seluruh Akun Pengguna </a>
                        <a class='dropdown-item' href='{{ route('user.create') }}'> Tambah Akun Pengguna </a>
                    </div>
                </li>

                
            </div>

            <div class="navbar-nav ml-auto">
                <li class='nav-item dropdown'>
                    @auth
                    <a
                        class='nav-link dropdown-toggle active' href='#' id='user' role='button'
                        data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        {{ auth()->user()->name }}
                    </a>
                    <div class='dropdown-menu' aria-labelledby='user'>
                        <div class='dropdown-item'>
                            <form action='{{ route('logout') }}' method='POST' class='d-inline-block'>
                                @csrf
                                <button type='submit' class='btn btn-danger btn-sm'>
                                    Keluar
                                    <i class='fa fa-sign-out'></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    @endauth
                </li>
            </div>
        </div>
    </div>
</nav>