<nav class="navbar navbar-dark bg-dark navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}"> {{ @config('app.name') }} </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                @auth

                @can('administrate-home')
                <li class='nav-item dropdown {{ Route::is('home.*') ? 'active' : '' }}'>
                    <a
                        class='nav-link dropdown-toggle' href='#' id='home' role='button'
                        data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        <i class='fa fa-home'></i>
                        Depan
                    </a>
                    <div class='dropdown-menu' aria-labelledby='home'>
                        <a class='dropdown-item' href='{{ route('slide.index') }}'> Gambar Slide </a>
                        {{-- <a class='dropdown-item' href='{{ route('mangrove.edit') }}'> Mangrove </a> --}}

                        @foreach ($information as $record)
                        <a class='dropdown-item' href='{{ route('information.edit', $record) }}'> {{ $record->menu_title }} </a>
                        @endforeach
                    </div>
                </li>
                @endcan

                <li class='nav-item dropdown {{ Route::is('program-pemerintah.*') ? 'active' : '' }}'>
                    <a
                        class='nav-link dropdown-toggle' href='#' id='program-pemerintah' role='button'
                        data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        <i class='fa fa-product-hunt'></i>
                        Program Pemerintah
                    </a>
                    <div class='dropdown-menu' aria-labelledby='program-pemerintah'>
                        <a class='dropdown-item' href='{{ route('program-pemerintah.index') }}'> Seluruh Program </a>
                        <a class='dropdown-item' href='{{ route('program-pemerintah.create') }}'> Tambah Program </a>
                    </div>
                </li>

                <li class='nav-item dropdown {{ Route::is('bibit.*') ? 'active' : '' }}'>
                    <a
                        class='nav-link dropdown-toggle' href='#' id='bibit' role='button'
                        data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        <i class='fa fa-circle'></i>
                        Bibit
                    </a>
                    <div class='dropdown-menu' aria-labelledby='bibit'>
                        <a class='dropdown-item' href='{{ route('bibit.index') }}'> Seluruh Bibit </a>
                        <a class='dropdown-item' href='{{ route('bibit.create') }}'> Tambah Bibit </a>
                    </div>
                </li>

                @can('administrate-users')
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
                @endcan

                @can('administrate-articles')
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
                @endcan

                @can('manage-articles')
                <li class='nav-item dropdown {{ Route::is('user-article.*') ? 'active' : '' }}'>
                    <a
                        class='nav-link dropdown-toggle' href='#' id='user-article' role='button'
                        data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        <i class='fa fa-file-text'></i>
                        Artikel
                    </a>
                    <div class='dropdown-menu' aria-labelledby='user-article'>
                        <a class='dropdown-item' href='{{ route('user-article.index') }}'> Seluruh Artikel </a>
                        <a class='dropdown-item' href='{{ route('user-article.create') }}'> Tambah Artikel </a>
                        <a class='dropdown-item' href='{{ route('user-article.own-index') }}'> Artikel Saya </a>
                    </div>
                </li>
                @endcan

                @can('administrate-categories')
                <li class='nav-item dropdown {{ Route::is('category.*') ? 'active' : '' }}'>
                    <a
                        class='nav-link dropdown-toggle' href='#' id='category' role='button'
                        data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        <i class='fa fa-list'></i>
                        Kategori
                    </a>
                    <div class='dropdown-menu' aria-labelledby='category'>
                        <a class='dropdown-item' href='{{ route('category.index') }}'> Seluruh Kategori </a>
                        {{-- <a class='dropdown-item' href='{{ route('category.create') }}'> Tambah Kategori </a> --}}
                    </div>
                </li>
                @endcan

                @can('administrate-researches')
                <li class='nav-item dropdown {{ Route::is('research.*') ? 'active' : '' }}'>
                    <a
                        class='nav-link dropdown-toggle' href='#' id='research' role='button'
                        data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        <i class='fa fa-flask'></i>
                        Hasil Penelitian
                    </a>
                    <div class='dropdown-menu' aria-labelledby='research'>
                        <a class='dropdown-item' href='{{ route('research.index') }}'> Seluruh Hasil Penelitian </a>
                        <a class='dropdown-item' href='{{ route('research.create') }}'> Tambah Hasil Penelitian </a>
                    </div>
                </li>
                @endcan

                @can('view-researches')
                <li class='nav-item dropdown {{ Route::is('user-research.*') ? 'active' : '' }}'>
                    <a
                        class='nav-link dropdown-toggle' href='#' id='user-research' role='button'
                        data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        <i class='fa fa-flask'></i>
                        Hasil Penelitian
                    </a>
                    <div class='dropdown-menu' aria-labelledby='user-research'>
                        <a class='dropdown-item' href='{{ route('user-research.index') }}'> Seluruh Hasil Penelitian </a>
                        @can('manage-researches')
                        <a class='dropdown-item' href='{{ route('user-research.create') }}'> Tambah Hasil Penelitian </a>
                        <a class='dropdown-item' href='{{ route('user-research.own-index') }}'> Hasil Penelitian Saya </a>
                        @endcan
                    </div>
                </li>
                @endcan

                @else
                <li class='nav-item dropdown {{ Route::is('information.*') ? 'active' : '' }}'>
                    <a
                        class='nav-link dropdown-toggle' href='#' id='information' role='button'
                        data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        <i class='fa fa-info'></i>
                        Mangrove
                    </a>

                    <div class='dropdown-menu' aria-labelledby='information'>
                        @foreach ($information as $record)
                        <a class='dropdown-item' href='{{ route('information.index', $record) }}'> {{ $record->menu_title }} </a>
                        @endforeach
                    </div>
                </li>

                <li class='nav-item {{ Route::is('user-article.*') ? 'active' : '' }}'>
                    <a class='nav-link' href='{{ route('user-article.index') }}'>
                        <i class='fa fa-file-text'></i>
                        Artikel
                    </a>
                </li>

                <li class='nav-item {{ Route::is('user-research.*') ? 'active' : '' }}'>
                    <a class='nav-link' href='{{ route('user-research.index') }}'>
                        <i class='fa fa-flask'></i>
                        Hasil Penelitian
                    </a>
                </li>

                <li class='nav-item {{ Route::is('search') ? 'active' : '' }}'>
                    <a class='nav-link' href='{{ route('search') }}'>
                        <i class='fa fa-search'></i>
                        Pencarian
                    </a>
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

                    @guest
                    <li class='nav-item active'>
                        <a class='nav-link' href='{{ route('login') }}'>
                            <button class="btn btn-light">
                                Masuk
                                <i class='fa fa-sign-in'></i>
                            </button>
                        </a>
                    </li>
                    @endguest
                </li>
            </div>
        </div>
    </div>
</nav>
