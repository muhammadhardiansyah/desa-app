<nav class="navbar p-4 sticky-top navbar-expand-lg navbar-dark bg-primary bg-gradient">
    <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ ($title == "Beranda" ? 'active' : '') }}"  aria-current="page" href="/">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($title == "Profil" ? 'active' : '') }}" href="/profil">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($title == 'Product' ? 'active' : '') }}" href="/product">Produk Unggulan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($title == "Perangkat Desa" ? 'active' : '') }}" href="/perangkat_desa">Perangkat Desa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($title == "Transparansi" ? 'active' : '') }}" href="/transparansi">Transparansi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($title == "Contact" ? 'active' : '') }}" href="/contact">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

