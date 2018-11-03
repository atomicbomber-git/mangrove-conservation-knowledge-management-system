<nav class="navbar navbar-dark bg-dark navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#"> {{ @config('app.name') }} </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                @auth
                <li class='nav-item dropdown {{ Route::is('home.*') ? 'active' : '' }}'>
                    <a
                        class='nav-link dropdown-toggle' href='#' id='home' role='button'
                        data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        <i class='fa fa-home'></i>
                        Depan
                    </a>
                    <div class='dropdown-menu' aria-labelledby='home'>
                        <a class='dropdown-item' href='{{ route('slide.index') }}'> Gambar Slide </a>
                    </div>
                </li>

                <li class='nav-item dropdown {{ Route::is('user.*') ? 'active' : '' }}'>
                    <a
                        class='nav-link dropdown-toggle' href='#' id='user' role='button'
                        data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        <i class='fa fa-users'></i>
                        Pengguna
                    </a>
                    
                    <div class='dropdown-menu' aria-labelledby='user'>
                        <a class='dropdown-item' href='{{ route('user.index') }}'> Seluruh Pengguna </a>
                        <a class='dropdown-item' href='{{ route('user.create') }}'> Tambah Pengguna </a>
                    </div>
                </li>

                <li class='nav-item dropdown {{ Route::is('article.*') ? 'active' : '' }}'>
                    <a
                        class='nav-link dropdown-toggle' href='#' id='article' role='button'
                        data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        <i class='fa fa-file-text'></i>
                        Artikel
                    </a>
                    <div class='dropdown-menu' aria-labelledby='article'>
                        <a class='dropdown-item' href='{{ route('article.index') }}'> Seluruh Artikel </a>
                        <a class='dropdown-item' href='{{ route('article.create') }}'> Tambah Artikel </a>
                    </div>
                </li>

                <li class='nav-item dropdown {{ Route::is('category.*') ? 'active' : '' }}'>
                    <a
                        class='nav-link dropdown-toggle' href='#' id='category' role='button'
                        data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        <i class='fa fa-list'></i>
                        Kategori
                    </a>
                    <div class='dropdown-menu' aria-labelledby='category'>
                        <a class='dropdown-item' href='{{ route('category.index') }}'> Seluruh Kategori </a>
                        <a class='dropdown-item' href='{{ route('category.create') }}'> Tambah Kategori </a>
                    </div>
                </li>

                <li class='nav-item dropdown {{ Route::is('research.*') ? 'active' : '' }}'>
                    <a
                        class='nav-link dropdown-toggle' href='#' id='research' role='button'
                        data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        <i class='fa fa-flask'></i>
                        H. Penelitian
                    </a>
                    <div class='dropdown-menu' aria-labelledby='research'>
                        <a class='dropdown-item' href='{{ route('research.index') }}'> Seluruh Hasil Penelitian </a>
                        <a class='dropdown-item' href='{{ route('research.create') }}'> Tambah Hasil Penelitian </a>
                    </div>
                </li>

                @endauth
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