<!-- Navbar & Jumbotron Page -->
<nav class="navbar fixed-top navbar-expand-xl">
    <div class="container-fluid m-0 px-5">
        <a class="navbar-brand me-0" href="index.html">
            <img src="/images/pod-talk-logo.png" class="logo-image img-fluid mx-1" alt="templatemo pod talk">
        </a>

        @if ($active == 'all_post' or $active == 'category' or $active == 'author')
            <form action="#" method="get" class="custom-form search-form flex-fill me-2" role="search">
                <div class="input-group input-group-lg">
                    <input name="search_post" type="search" class="form-control" id="search"
                        placeholder="Cari Postingan" aria-label="Search" value="{{ request('search_post') }}">
                    @if (request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    @if (request('author'))
                        <input type="hidden" name="author" value="{{ request('author') }}">
                    @endif
                    <button type="submit" class="form-control" id="submit">
                        <i class="bi-search"></i>
                    </button>
                </div>
            </form>
        {{-- @elseif ($active == 'perangkat')
            <form action="#" method="get" class="custom-form search-form flex-fill me-2" role="search">
                <div class="input-group input-group-lg">
                    <input name="search_pearngkat" type="search" class="form-control" id="search"
                        placeholder="Cari Perangkat Desa" aria-label="Search">

                    <button type="submit" class="form-control" id="submit">
                        <i class="bi-search"></i>
                    </button>
                </div>
            </form> --}}
        @else
            <h2><span class="navbar-text text-white fs-4 p-3">Kantor Desa Sidodadi</span></h2>

        @endif
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item px-1">
                    <a class="nav-link {{ $active == 'home' ? 'active' : '' }}" href="/">Beranda</a>
                </li>

                <li class="nav-item px-1">
                    <a class="nav-link {{ $active == 'profil' ? 'active' : '' }}" href="/profil">Profil</a>
                </li>

                <li class="nav-item dropdown px-1">
                    <a class="nav-link dropdown-toggle {{ $active == 'all_post' ? 'active' : '' }}" href="/posts"
                        id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">Posts</a>

                    <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                        <li><a class="dropdown-item {{ $active == 'all_post' ? 'active' : '' }}" href="/posts">All
                                Posts</a></li>

                        <li><a class="dropdown-item {{ $active == 'categories' ? 'active' : '' }}"
                                href="/categories">Categories</a></li>
                    </ul>
                </li>

                <li class="nav-item px-1">
                    <a class="nav-link {{ $active == 'product' ? 'active' : '' }}" href="/product">Produk</a>
                </li>

                <li class="nav-item px-1">
                    <a class="nav-link  {{ $active == 'perangkat' ? 'active' : '' }}"
                        href="/perangkat_desa">Perangkat</a>
                </li>

                <li class="nav-item px-1">
                    <a class="nav-link {{ $active == 'transparansi' ? 'active' : '' }}"
                        href="/transparansi">Transparansi</a>
                </li>

                <li class="nav-item px-1">
                    <a class="nav-link {{ $active == 'contact' ? 'active' : '' }}" href="/contact">Contact</a>
                </li>

                @auth
                    <li class="nav-item dropdown px-1">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">{{ auth()->user()->username }}</a>

                        <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                            <li>
                                <a class="dropdown-item" href="/dashboard">
                                    <i class="bi bi-building"></i>
                                    Dashboard
                                </a>
                            </li>
                            <li>
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="bi bi-box-arrow-left"></i>
                                        Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item px-1">
                        <a class="nav-link px-4 btn btn-primary bg-gradient rounded" href="/login">
                            <i class="bi bi-box-arrow-in-right"></i>
                            Login
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
