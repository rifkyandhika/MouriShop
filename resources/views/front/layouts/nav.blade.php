<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Mouri Shop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}"></i>Beranda
                    </a>
                </li>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/tentangkami') }}"></i>Tentang Kami
                    </a>
                </li>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/cart"><i class="fa fa-shopping-cart"></i> Keranjang
                        @if (Cart::instance('default')->count() > 0)
                            <strong>
                                ({{ Cart::instance('default')->count() }})
                            </strong>
                        @endif
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user"></i> {{ auth()->check() ? auth()->user()->name : 'Akun' }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right bg-dark" aria-labelledby="bd-versions">
                        @if (!auth()->check())
                            <a class="dropdown-item bg-dark text-white" href="{{  url('user/login') }}">Masuk</a>
                            <a class="dropdown-item bg-dark text-white" href="{{  url('user/register') }}">Daftar</a>
                        @else
                            <a class="dropdown-item bg-dark text-white" href="{{  url('user/profile') }}"><i class="fa fa-user"></i> Profile</a>
                            <hr>
                            <a class="dropdown-item bg-dark text-white" href="{{  url('user/logout') }}"><i class="fa fa-lock"></i> Logout</a>
                        @endif
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
